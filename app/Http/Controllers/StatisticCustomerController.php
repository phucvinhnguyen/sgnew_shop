<?php

namespace App\Http\Controllers;

use App\Repository\Customer\CustomerRepository;
use App\Repository\Product\ProductRepository;
use Illuminate\Http\Request;

class StatisticCustomerController extends Controller
{
    private $productRepository;
    private $customerRepository;


    public function __construct(ProductRepository $productRepository, CustomerRepository $customerRepository)
    {
        $this->productRepository = $productRepository;
        $this->customerRepository = $customerRepository;
    }

    public function index(Request $request)
    {
        $date = $request->get('fromDate');
        if (empty($date) || $date > date('Y/m/d')) {
            $date = date('Y/m/d');
        }

        $customerReportList = null;

        $productListFromDate = $this->productRepository->getProductByDate($date);

        if (count($productListFromDate) > 0) {
            foreach ($productListFromDate as $product) {
                $customer = $this->customerRepository->find($product->customer_id);
                $customerReportList[] = [
                    'customer_name' => $customer->full_name,
                    'customer_phone' => $customer->phone,
                    'product_title' => $product->title,
                    'product_price' => $product->price,
                    'product_reserved_price' => $product->reserved_price
                ];
            }
        }
        return view('pages.statistic.customer.index', ['customerReportList' => $customerReportList]);
    }

    public function searchDate(Request $request)
    {
        return redirect()->route('page.statistc.customer', ['fromDate' => $request->time_chooseDate]);
    }
}
