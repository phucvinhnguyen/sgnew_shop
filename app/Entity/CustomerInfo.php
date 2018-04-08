<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    protected $table = 'customer_info';
    public $timestamps = false;

    public function scopeCustomerId($query, $id)
    {
        return $query->where('customer_id', $id);
    }
}
