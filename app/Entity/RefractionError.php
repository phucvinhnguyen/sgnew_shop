<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class RefractionError extends Model
{
    public $timestamps = false;
    protected $table = 'refraction_error';
    protected $fillable = ['title'];
}
