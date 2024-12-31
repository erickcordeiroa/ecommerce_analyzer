<?php

namespace App\Infrastructure\Repositories;

use App\Domains\Entities\Product;
use App\Infrastructure\Models\Product as ProductModel;
use App\Domains\Repositories\ProductRepositoryInterface;
use Exception;
use stdClass;


class ProductRepository extends ProductRepositoryInterface
{
    public function __construct(private ProductModel $product){}

    public function create(Product $data): void
    {
        try {
            $this->product->create($data->toArray());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
