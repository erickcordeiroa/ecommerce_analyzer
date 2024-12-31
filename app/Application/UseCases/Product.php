<?php

namespace App\Application\UseCases;

use App\Domains\Entities\Product as EntitiesProduct;
use App\Domains\Repositories\ProductRepository;

class Product
{
    public function __construct(
       private readonly ProductRepository $productRepository
    ) {}


    public function create(EntitiesProduct $data): EntitiesProduct
    {
        return $this->productRepository->create($data);
    }
}