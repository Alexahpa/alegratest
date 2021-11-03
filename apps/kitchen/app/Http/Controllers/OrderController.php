<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Recipe;
use App\Services\KitchenService;
use App\Services\Statuses;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function prepare(Request $request)
    {
        // try {
            $recipe = Recipe::inRandomOrder()->first();
            $kitchen = new KitchenService();
            $id = $kitchen->preparePlate($recipe);
            $success = true;
            return response()->json(compact('success', 'id'));
        // } catch (Exception $e) {
        //     return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        // }
    }



    public function finishPreparation(Request $request)
    {
        try {
            $orderId = $request->orderId;
            $kitchen = new KitchenService();
            $orderId = $kitchen->changeStatus($orderId);
            $success = true;
            return response()->json(compact('success', 'orderId'));
            } catch (Exception $e) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
            }
    }
}
