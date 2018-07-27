<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email', 
        'birthday',
        'cpf', 
    ];

    protected $dates = [
        'birthday',
    ];

    public function getFieldsName()
    {
        return $this->fillable;
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
