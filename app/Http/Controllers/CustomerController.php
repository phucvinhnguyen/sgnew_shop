<?php

namespace App\Http\Controllers;

use App\Repository\Customer\CustomerInfoRepository;
use App\Repository\Customer\CustomerRepository;
use App\Repository\Lens\LensRepository;
use App\Repository\Product\ProductRepository;
use App\Repository\Refraction\RefractionErrorRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $productRepository;
    private $customerRepository;
    private $customerInfoRepository;
    private $refractionErrorRepository;
    private $lensRepository;

    public function __construct(ProductRepository $productRepository,
                                CustomerRepository $customerRepository,
                                CustomerInfoRepository $customerInfoRepository,
                                RefractionErrorRepository $refractionErrorRepository, LensRepository $lensRepository)
    {
        $this->productRepository = $productRepository;
        $this->customerRepository = $customerRepository;
        $this->customerInfoRepository = $customerInfoRepository;
        $this->refractionErrorRepository = $refractionErrorRepository;
        $this->lensRepository = $lensRepository;
    }

    public function index(Request $request)
    {
        $buyInfoList = null;
        $customer = null;
        $customerInfo = null;
        $lastestInfo = null;

        $customerPhone = $request->query('phone');

        if (!empty($customerPhone)) {
            $customer = $this->customerRepository->getCustomerByPhone($customerPhone);
            if (isset($customer)) {

                $buyInfoList = $this->productRepository->getByCustomerId($customer->id);
                $customerInfo = $this->customerInfoRepository->getInfoByCustomerId($customer->id);

                $lastestInfo = $customerInfo->first();
                if (isset($lastestInfo) && !empty($lastestInfo)) {
                    $lastestInfo['refraction_error'] = $this->refractionErrorRepository->find($lastestInfo->refraction_error_id)->title;
                    $lastestInfo['lens'] = $this->lensRepository->find($lastestInfo->lens_id)->title;
                }
            }
        }

        $refractionError = $this->refractionErrorRepository->getAll();
        $allTypeLens = $this->lensRepository->getAll();

        return view('pages.customer.customer', ['buyInfoList' => $buyInfoList,
            'customer' => $customer,
            'customerInfo' => $customerInfo,
            'refractionError' => $refractionError,
            'lastestInfo' => $lastestInfo,
            'allTypeLens' => $allTypeLens]
        );
    }

    public function searchCustomer(Request $request)
    {
        return redirect()->route('page.customer', ['phone' => $request->get('phone')]);
    }

    public function createNewCustomerInfo(Request $request)
    {
        return redirect()->route('page.customer', ['phone' => $request->query('phone')]);
    }
}
