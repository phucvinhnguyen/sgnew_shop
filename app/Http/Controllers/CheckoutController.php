<?php

namespace App\Http\Controllers;

use App\Repository\Customer\CustomerRepository;
use App\Repository\Product\ProductRepository;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $productRepository;
    private $customerRepository;

    public function __construct(ProductRepository $productRepository, CustomerRepository $customerRepository)
    {
        $this->productRepository = $productRepository;
        $this->customerRepository = $customerRepository;
    }

    public function checkOut(Request $request)
    {
        $cart = $request->session()->get('cart');
        $customerPhone = $request->get('customer_phone');
        $customerName = $request->get('customer_name');

        if (isset($customerName) && !empty($customerName)) {
            $attributes['full_name'] = $customerName;
            $attributes['phone'] = $customerPhone;
            $customerId = $this->customerRepository->createNewCustomer($attributes);
        }
        else {
            $customerId = $this->customerRepository->getCustomerByPhone($customerPhone)->id;
        }

        if (!isset($customerId)) {
            $customerAttributes['full_name'] = $request->get('customer_name');
            $customerAttributes['phone'] = $request->get('customer_phone');

            $customerId = $this->customerRepository->createNewCustomer($customerAttributes);
        }

        foreach ($cart as $item) {
            $attributes['reserved_price'] = $item['reserved-price-product'];
            $attributes['price'] = $item['price-product'];
            $attributes['title'] = $item['name-product'];
            $attributes['customer_id'] = $customerId;

            $this->productRepository->addNewProduct($attributes);
        }

        if ($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }

        return redirect()->route('page.sale');
    }
}
