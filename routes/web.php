<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::permanentRedirect("/", "/products");
Route::get("/products", [ProductController::class, "index"]);
Route::get("/products/create", [ProductController::class, "create"]);
Route::post("/products/create", [ProductController::class, "store"]);
Route::delete("/products/{id}", [ProductController::class, "delete"]);
Route::get("/products/edit/{id}", [ProductController::class, "edit"]);
Route::patch("/products/edit/{id}", [ProductController::class, "update"]);