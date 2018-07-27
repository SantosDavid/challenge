<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'customer_id', 
        'address',
        'number',
        'neighborhood',
        'zipcode',
        'city',
        'latitude',
        'longitude',
    ];
}
