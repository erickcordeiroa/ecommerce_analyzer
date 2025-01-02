<?php 

namespace App\Domains\Repositories;

use App\Domains\Entities\Product;

interface ProductRepositoryInterface
{
    public function create(Product $data): Product;
}