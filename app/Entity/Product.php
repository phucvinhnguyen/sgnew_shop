<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function scopeCustomerId($query, $id)
    {
        return $query->where('customer_id', $id);
    }

    public function scopeCreatedAt($query, $date)
    {
        return $query->where('created_at', $date);
    }
}
