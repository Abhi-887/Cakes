<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/products', function () {
    $products = Product::all();
    return $products;
});
Route::middleware('auth:sanctum')->put('/products/{id}', function (Request $request, $id) {
    // Validate the request data
    $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Update the product with validated data
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->save();

    return response()->json($product);
});