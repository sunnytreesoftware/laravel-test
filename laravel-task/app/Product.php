<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'car_vin',
        'car_model',
        'price',
        'stock',
        'year',
        'image_path'
    ];
}
