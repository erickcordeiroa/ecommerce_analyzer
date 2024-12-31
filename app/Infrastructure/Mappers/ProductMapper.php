<?php

namespace App\Infrastructure\Mappers;

use App\Domains\Entities\Product;

class ProductMapper
{
    public function mapProduct(array $product): Product
    {
        return (new Product(
            $product['title'],
            $product['price'],
            $product['product_url'],
        ))
        ->setImageUrl($product['image_url'] ?? null)
        ->setDescription($product['description'] ?? null);
    }
}