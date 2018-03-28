<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    public function scopePhone($query, $phone)
    {
        return $query->where('phone', $phone);
    }
}
