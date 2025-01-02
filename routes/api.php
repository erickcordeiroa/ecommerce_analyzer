<?php

use App\Infrastructure\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/new-product', function () {
    return 'olá mundo';
});

Route::post('/product', [ProductController::class, 'create']);

