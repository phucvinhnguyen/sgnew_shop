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

    public function getCustomerByPhone($phone)
    {
        return $this->model->phone($phone)->first();
    }
}