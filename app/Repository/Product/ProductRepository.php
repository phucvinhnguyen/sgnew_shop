<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29-Mar-18
 * Time: 11:21 AM
 */

namespace App\Repository\Product;


use App\Entity\Product;
use App\Repository\Base\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function getModel()
    {
        return Product::class;
    }

    public function addNewProduct($attributes)
    {
        $product = new Product();
        $product->customer_id = $attributes['customer_id'];
        $product->title = $attributes['title'];
        $product->price = $attributes['price'];
        $product->reserved_price = $attributes['reserved_price'];

        return $product->save();
    }

    public function getByCustomerId($customerId)
    {
        return $this->model->customerId($customerId)->get();
    }
}