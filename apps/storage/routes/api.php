<?php

use App\Http\Controllers\IngredientStockController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/ingredients', [IngredientStockController::class, 'ingredients']);
Route::get('/ingredients-stock', [IngredientStockController::class, 'index']);

Route::get('/purchases', [PurchaseController::class, 'index']);

