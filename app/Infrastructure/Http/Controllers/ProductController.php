<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\UseCases\Product;
use Illuminate\Http\Request;
use App\Infrastructure\Mappers\ProductMapper;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function __construct(
        private readonly Product $product,
        private readonly ProductMapper $map
    ) {
    }

    public function create(Request $request)
    {
        // Validação da requisição
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'product_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Criação do produto
        try {
            $product = $this->product->create($this->map->mapProduct($request->all()));
            return response()->json(['product' => $product], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}