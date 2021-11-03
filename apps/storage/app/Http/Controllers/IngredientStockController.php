<?php

namespace App\Http\Controllers;

use App\Events\IngredientsRequested;
use Illuminate\Http\Request;

class IngredientStockController extends Controller
{
    public function ingredients(Request $request)
    {
        try {
            $ingredients = $request->products;
            $orderId = $request->orderId;

            event(new IngredientsRequested($ingredients, $orderId));
            $success = true;
            return response()->json(compact('success'));
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
