<?php

namespace App\Http\Livewire;

use App\Services\API\StorageAPIService;
use GuzzleHttp\Client;
use Livewire\Component;

class PurchaseHistory extends Component
{

    public $purchases = [];

    public function update()
    {
        $storageService = new StorageAPIService();
        $this->purchases = $storageService->getPurchases();

    }


    public function render()
    {
        return view('livewire.purchase-history');
    }
}
