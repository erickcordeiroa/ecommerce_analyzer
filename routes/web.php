<?php

use App\Infrastructure\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-product', function () {
    return 'olá mundo';
});

Route::post('/product', [ProductController::class, 'create']);
