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

    public function getProductBetweenDate($fromDate, $toDate)
    {
        $query = $this->model;

        $query = $query->select(DB::raw('customer_id, sum(reserved_price) as price, date(created_at) as created_at'));

        if (!empty($fromDate)) {
            $query = $query->whereRaw('date(created_at) >= \'' .$fromDate. '\'');
        }

        if (!empty($toDate)) {
            $query = $query->whereRaw('date(created_at) <= \'' .$toDate. '\'');
        }

        $query = $query->groupBy(DB::raw('date(created_at)'))->groupBy('customer_id');

        $sub = $query->toSql();

        $records = DB::table(DB::raw("($sub) as a"))
            ->select(DB::raw('count(customer_id), sum(price), created_at'))
            ->mergeBindings($query->getQuery())
            ->groupBy(DB::raw('date(created_at)'));

        dd($records->get());

        return $records;
    }

    public function sumReservedPrice($date)
    {
        return $this->model->select(DB::raw('customer_id, sum(reserved_price) as price'))->whereRaw('date(created_at) = \''. $date .'\'')->groupBy('customer_id')->get();
    }
}