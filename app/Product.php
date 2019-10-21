<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'car_id', 'user_id' ,'owner_id', 'price','quantity'
    ];
}
