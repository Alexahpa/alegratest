<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;

class PurchaseController extends Controller
{
    public function index()
    {
        try {
            $purchases = PurchaseHistory::with('ingredient')->get();
            $success = true;
            return response()->json(compact('success', 'purchases'));
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
