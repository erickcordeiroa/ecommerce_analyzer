<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Product extends Model
{
    use RefreshDatabase;
    protected $table = "product";

    protected $fillable = [
        'title',
        'description',
        'price',
        'image_url',
        'product_url',
    ];
}
