<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\UseCases\ProductUseCase;
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

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'product_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        try {
            $product = $this->product->create($this->map->mapProduct($request->all()));
            return response()->json(
                new ProductResource($product),
                Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}