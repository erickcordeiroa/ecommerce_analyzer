<?php

namespace App\Application\UseCases;

use App\Domains\Entities\Product as EntitiesProduct;
use App\Domains\Repositories\ProductRepositoryInterface;

class Product
{
    public function __construct(
       private readonly ProductRepositoryInterface $productRepository
    ) {}


    public function create(EntitiesProduct $data): void
    {
        return $this->productRepository->create($data);
    }
}