<?php 

namespace App\Domains\Repositories;

use App\Domains\Entities\Product;
use stdClass;

class ProductRepository
{
    public function create(Product $data): void;
}