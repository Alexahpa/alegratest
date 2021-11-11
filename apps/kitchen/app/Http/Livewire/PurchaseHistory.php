<?php

namespace App\Http\Livewire;

use App\Models\PurchaseHistory as ModelsPurchaseHistory;
use Livewire\Component;

class PurchaseHistory extends Component
{

    public $purchases = [];

    public function update()
    {
        $this->purchases = ModelsPurchaseHistory::all();

    }


    public function render()
    {
        return view('livewire.purchase-history');
    }
}
