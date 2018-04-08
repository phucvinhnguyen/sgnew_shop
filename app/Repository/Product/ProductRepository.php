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
use Illuminate\Support\Facades\DB;

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

    public function updatePayment($id, $attributes)
    {
        $payment = $this->model->find($id);
        $payment->title = $attributes['title'];
        $payment->price = $attributes['price'];
        $payment->reserved_price = $attributes['reserved_price'];
        return $payment->save();
    }

    public function getProductBetweenDate($fromDate, $toDate)
    {
        $query = $this->model;

        $query = $query->select(DB::raw('customer_id, sum(reserved_price) as price, date(created_at) as created_date'));

        if (!empty($fromDate)) {
            $query = $query->whereRaw('date(created_at) >= \'' .$fromDate. '\'');
        }

        if (!empty($toDate)) {
            $query = $query->whereRaw('date(created_at) <= \'' .$toDate. '\'');
        }

        $query = $query->groupBy(DB::raw('date(created_at), customer_id'));
        $sub = $query->toSql();

        $records = DB::table(DB::raw("($sub) as a"))
            ->select(DB::raw('count(customer_id) as total_customer, sum(price) as total_price, date(created_date) as created_date '))
            ->groupBy(DB::raw('date(created_date)'));

        return $records->get();
    }

    public function sumReservedPrice($date)
    {
        return $this->model->select(DB::raw('customer_id, sum(reserved_price) as price'))->whereRaw('date(created_at) = \''. $date .'\'')->groupBy('customer_id')->get();
    }
}