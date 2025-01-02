<?php

namespace App\Infrastructure\Resource;

use App\Domains\Entities\Product;
use Illuminate\Contracts\Support\Arrayable;

class ProductResource implements Arrayable
{

    public function __construct(
        private readonly Product $product
    ){}
    
    
    public function toArray(): array
    {
        return $this->product->toArray();
    }
}
