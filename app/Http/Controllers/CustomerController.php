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

                $customerInfoId = intval($request->get('infoId'));

                if ($request->has('infoId') && !empty($customerInfoId)) {
                    $lastestInfo = $customerInfo->find($customerInfoId);
                }
                else {
                    $lastestInfo = $customerInfo->first();
                }

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

    public function addInfoCustomer(Request $request)
    {
        $customerPhone = intval($request->get('phone'));

        if (!empty($customerPhone) && $customer = $this->customerRepository->getCustomerByPhone($customerPhone)) {

            $customerInfo = $request->only(['refraction-error-id', 'left-eye', 'right-eye', 'view-far', 'read-book', 'lens-id']);

            if (isset($customerInfo)) {
                $attributes['customer_id'] = intval($customer->id);
                $attributes['refraction_error_id'] = intval($customerInfo['refraction-error-id']);
                $attributes['lens_id'] = intval($customerInfo['lens-id']);
                $attributes['left_eye'] = $customerInfo['left-eye'];
                $attributes['right_eye'] = $customerInfo['right-eye'];
                $attributes['view_far'] = $customerInfo['view-far'];
                $attributes['read_book'] = $customerInfo['read-book'];
                $this->customerInfoRepository->createCustomerInfo($attributes);
            }
        }
        return redirect(routeQuery('page.customer'));
    }

    public function deleteInfoCustomer(Request $request)
    {
        $customerInfoId = intval($request->get('customer-info-id'));
        $customerPhone = intval($request->get('phone'));

        $customer = $this->customerRepository->getCustomerByPhone($customerPhone);

        $customerInfo = $this->customerInfoRepository->find($customerInfoId);

        if (isset($customerInfo) && $customerInfo->customer_id === $customer->id ) {
            $this->customerInfoRepository->delete($customerInfoId);
        }

        return redirect(routeQuery('page.customer'));
    }

    public function editCustomer(Request $request)
    {
        $customerId = $request->get('customer_id');
        $customerName = $request->get('customer_name');
        $customerPhone = $request->get('customer_phone');

        if (!empty($customerId)) {
            if (!empty($customerName)) {
                $this->customerRepository->editName($customerId, $customerName);
            }

            if (!empty($customerPhone)) {
                $this->customerRepository->editPhone($customerId, $customerPhone);
            }
        }

        return redirect()->route('page.customer', ['phone' => $customerPhone]);
    }

    public function editPayment(Request $request)
    {
        $paymentId = intval($request->get('payment-id'));

        $customerPayment = $request->only(['name-product', 'price', 'reserved-price']);
        $customerPhone = intval($request->get('phone'));

        $customer = $this->customerRepository->getCustomerByPhone($customerPhone);
        $payment = $this->productRepository->find($paymentId);

        if (isset($customerPayment) && $payment->customer_id == $customer->id) {
            $attributes['title'] = $customerPayment['name-product'];
            $attributes['price'] = intval($customerPayment['price']);
            $attributes['reserved_price'] = intval($customerPayment['reserved-price']);
            $this->productRepository->updatePayment($paymentId, $attributes);
        }

        return redirect(routeQuery('page.customer'));
    }
}
