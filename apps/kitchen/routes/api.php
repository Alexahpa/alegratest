<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
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


Route::post('/order/prepare', [OrderController::class, 'prepare']);
Route::post('/order/finishPreparation', [OrderController::class, 'finishPreparation']);

Route::resource('recipe', RecipeController::class)->only([
    'show', 'index'
]);
