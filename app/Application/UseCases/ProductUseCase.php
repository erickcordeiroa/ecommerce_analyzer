<?php

namespace App\Application\UseCases;

use App\Domains\Entities\Product;
use App\Domains\Repositories\ProductRepositoryInterface;

class ProductUseCase
{
    public function __construct(
       private readonly ProductRepositoryInterface $productRepository
    ) {}


    public function execute(Product $data): Product
    {
        return $this->productRepository->create($data);
    }
}