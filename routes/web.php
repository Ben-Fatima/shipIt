<?php

use App\Http\Controllers\CamionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\UserController;
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

Route::permanentRedirect("/", "/shipments")->middleware('auth');
Route::permanentRedirect("/", "/register")->middleware('guest');


Route::get("/products", [ProductController::class, "index"]);
Route::get("/products/create", [ProductController::class, "create"]);
Route::post("/products/create", [ProductController::class, "store"]);
Route::delete("/products/{id}", [ProductController::class, "delete"]);
Route::get("/products/edit/{id}", [ProductController::class, "edit"]);
Route::patch("/products/edit/{id}", [ProductController::class, "update"]);

Route::get('/clients',[ClientController::class,'index']);
Route::get('/clients/create',[ClientController::class,'create']);
Route::post("/clients/create", [ClientController::class, "store"]);
Route::delete("/clients/{id}", [ClientController::class, "delete"]);

Route::get('/trucks',[TruckController::class,'index']);
Route::get('/trucks/create',[TruckController::class,'create']);
Route::post("/trucks/create", [TruckController::class, "store"]);
Route::get("/trucks/edit/{id}", [TruckController::class, "edit"]);
Route::delete("/trucks/{id}", [TruckController::class, "delete"]);
Route::post("/trucks/{id}", [TruckController::class, "returnTruck"]);

Route::get('/shipments',[ShipmentController::class,'index']);
Route::get('/shipments/create',[ShipmentController::class,'create']);
Route::post("/shipments/create", [ShipmentController::class, "store"]);
Route::get("/shipments/{id}", [ShipmentController::class, "addProducts"]);
Route::delete("/shipments/{id}", [ShipmentController::class, "delete"]);
Route::post("/shipments/{id}", [ShipmentController::class, "assignProducts"]);

Route::get('/transport',[TransportController::class,"display"]);
Route::post('/transport',[TransportController::class,"assign"]);

Route::get("/register", [UserController::class, "create"])->middleware('guest');
Route::post("/register", [UserController::class, "store"])->middleware('guest');
Route::post("/logout", [UserController::class, "logout"]);
Route::get("/login", [UserController::class, "log"]);
Route::post("/login", [UserController::class, "login"]);