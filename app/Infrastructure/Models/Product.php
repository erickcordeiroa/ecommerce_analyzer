<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'image_url',
        'product_url',
    ];
}