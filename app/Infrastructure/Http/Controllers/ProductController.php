<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\UseCases\ProductUseCase;
use App\Infrastructure\Request\ProductRequest;
use App\Infrastructure\Resource\ProductResource;
use Illuminate\Http\Request;
use App\Infrastructure\Mappers\ProductMapper;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function __construct(
        private readonly ProductUseCase $product,
        private readonly ProductMapper $map
    ) {
    }

    public function create(ProductRequest $request)
    {
        $request->validated();
        
        try {
            $product = $this->product->execute($this->map->mapProduct($request->all()));
            return response()->json(
                new ProductResource($product),
                Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}