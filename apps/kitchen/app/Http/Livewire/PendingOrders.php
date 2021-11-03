<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Services\Statuses;
use Livewire\Component;

class PendingOrders extends Component
{
    public $orders = [];

    public function update()
    {
        $this->orders = Order::where('status', Statuses::IN_PROGRESS)->get();

    }

    public function render()
    {
        return view('livewire.pending-orders');
    }
}
