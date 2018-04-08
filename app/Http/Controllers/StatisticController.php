<?php

namespace App\Http\Controllers;

use App\Repository\Product\ProductRepository;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    private $customerRepository;
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $fromDate = $request->get('fromDate');
        $toDate = $request->get('toDate');

        if (empty($toDate) || $toDate > date('Y/m/d')) {
            $toDate = date('Y/m/d');
        }

        $productReportList = null;

        if (!empty($fromDate)) {
            $productReportList = $this->productRepository->getProductBetweenDate($fromDate, $toDate);
        }

        $productMoneyToday = $this->productRepository->sumReservedPrice(date('Y/m/d'));

        return view('pages.statistic.index', [
            'productMoneyToday' => $productMoneyToday,
            'productReportList' => $productReportList
        ]);
    }

    public function searchDate(Request $request)
    {
        return redirect()->route('page.statistic', ['fromDate' => $request->get('time_FromDate'), 'toDate' => $request->get('time_ToDate')]);
    }


}
