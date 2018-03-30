<?php
namespace App\Repository\Customer;


use App\Entity\Customer;
use App\Repository\Base\BaseRepository;

class CustomerRepository extends BaseRepository
{
    public function getModel()
    {
        return Customer::class;
    }

    public function createNewCustomer($attributes)
    {
        $customer = new Customer();
        $customer->full_name = $attributes['full_name'];
        $customer->phone = $attributes['phone'];
        $customer->save();
        return $customer->id;
    }

    public function getCustomerByPhone($phone)
    {
        return $this->model->phone($phone)->first();
    }
}