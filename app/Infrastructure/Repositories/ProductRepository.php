<?php

namespace App\Infrastructure\Repositories;

use App\Domains\Entities\Product;
use App\Infrastructure\Mappers\ProductMapper;
use App\Infrastructure\Models\Product as ProductModel;
use App\Domains\Repositories\ProductRepositoryInterface;
use Exception;


class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(private ProductModel $product){}

    public function create(Product $data): Product
    {
        try {
            $data = $this->product->create($data->toArray());
            return (new ProductMapper())->mapProduct($data);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
