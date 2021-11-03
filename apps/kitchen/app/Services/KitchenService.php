<?php

namespace App\Services;

use App\Jobs\PrepareOrder;
use App\Models\Order;
use App\Models\Recipe;

class KitchenService
{
    public function __construct()
    {
    }

    public function preparePlate(Recipe $recipe)
    {
        $order = new Order();
        $order->status = Statuses::IN_PROGRESS;
        $order->recipe_id = $recipe->id;
        $order->save();
        PrepareOrder::dispatch($order)->onQueue('kitchen');

        return $order->id;
    }

    public function changeStatus(int $orderId)
    {
        $order = Order::find($orderId);
        $order->status = Statuses::DELIVERED;
        $order->save();

        return $order->id;
    }
}
