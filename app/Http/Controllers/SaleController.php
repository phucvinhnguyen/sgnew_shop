<?php

namespace App\Http\Controllers;

use App\Repository\Customer\CustomerRepository;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index(Request $request)
    {
        //$request->session()->forget('cart');
        $cart = $request->session()->get('cart');
        $customer = $request->session()->get('customer');

        $totalPrice = 0;
        if (isset($cart)) {
            $totalPrice = array_sum(array_column($cart, 'price-product'));
        }


        $phone = $request->query('phone');

        $newCustomer = false;
        if (!empty($phone)) {
            $phone = $request->query('phone');
            $customer = $this->customerRepository->getCustomerByPhone($phone);
            if (!isset($customer)) {
                $newCustomer = true;
            }
        }

        return view('pages.sale', ['cart' => $cart, 'customer' => $customer, 'total' => $totalPrice, 'newCustomer' => $newCustomer]);
    }

    public function searchCustomer(Request $request)
    {
        return redirect()->route('page.sale', ['phone' => $request->get('phone')]);
    }

    public function addNewCartItem(Request $request)
    {
        $newCartItemName = $request->get('name-product');
        $newCartItemPrice = $request->get('price-product');

        if (!$request->session()->has('cart')) {
            $request->session()->put('cart', null);
        }

        $cart = $request->session()->get('cart');
        $cart[] = ['name-product' => $newCartItemName, 'price-product' => $newCartItemPrice];

        $request->session()->put('cart', $cart);

        return redirect()->route('page.sale');

    }

    public function deleteCartItem(Request $request)
    {
        if($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            $itemId = $request->get('item-id');

            if (count($cart) > 0) {
                unset($cart[$itemId]);
                $request->session()->put('cart', $cart);
            }
        }
        return redirect()->route('page.sale');
    }

    public function deleteAll(Request $request)
    {
        if ($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }

        if ($request->session()->has('customer')) {
            $request->session()->forget('customer');
        }

        return redirect()->route('page.sale');
    }

    public function checkOut(Request $request)
    {
        $cart = $request->session()->get('cart');

    }
}