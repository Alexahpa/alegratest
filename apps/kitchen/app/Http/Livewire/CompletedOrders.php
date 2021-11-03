<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Services\Statuses;
use Livewire\Component;

class CompletedOrders extends Component
{
    public $orders = [];

    public function update()
    {
        $this->orders = Order::where('status', Statuses::DELIVERED)->get();
    }

    public function render()
    {
        return view('livewire.completed-orders');
    }
}
