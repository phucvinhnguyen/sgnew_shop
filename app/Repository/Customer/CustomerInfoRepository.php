<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29-Mar-18
 * Time: 3:32 PM
 */

namespace App\Repository\Customer;


use App\Entity\CustomerInfo;
use App\Repository\Base\BaseRepository;

class CustomerInfoRepository extends BaseRepository
{
    public function getModel()
    {
        return CustomerInfo::class;
    }

    public function createCustomerInfo($attributes)
    {
        $customerInfo = new CustomerInfo();

        $customerInfo->customer_id = $attributes['customer_id'];
        $customerInfo->lens_id = $attributes['lens_id'];
        $customerInfo->refraction_error_id = $attributes['refraction_error_id'];
        $customerInfo->left_eye = $attributes['left_eye'];
        $customerInfo->right_eye = $attributes['right_eye'];
        $customerInfo->view_far = $attributes['view_far'];
        $customerInfo->read_book = $attributes['read_book'];

        return $customerInfo->save();
    }

    public function getInfoByCustomerId($id)
    {
        return $this->model->customerId($id)->orderBy('created_at','asc')->get();
    }

    public function getInfoById($id)
    {
        return $this->model->find($id);
    }
}