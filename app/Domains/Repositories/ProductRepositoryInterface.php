<?php 

namespace App\Domains\Repositories;

use App\Domains\Entities\Product;

class ProductRepositoryInterface
{
    public function create(Product $data): void;
}