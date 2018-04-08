<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;

    public function scopePhone($query, $phone)
    {
        return $query->where('phone', $phone);
    }
}
