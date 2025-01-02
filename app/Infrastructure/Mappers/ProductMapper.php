<?php

namespace App\Infrastructure\Mappers;

use App\Domains\Entities\Product;

class ProductMapper
{
    public function mapProduct(object|array $product): Product
    { 
        $map = (new Product(
            $product['title'],
            $product['price'],
            $product['product_url'],
        ))
        ->setImageUrl($product['image_url'] ?? null)
        ->setDescription($product['description'] ?? null);

        return $map;
    }
}