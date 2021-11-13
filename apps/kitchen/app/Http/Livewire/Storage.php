<?php

namespace App\Http\Livewire;

use App\Services\API\StorageAPIService;
use Livewire\Component;

class Storage extends Component
{
    public $storage = [];

    public function update()
    {

        $storageService = new StorageAPIService();

        $this->storage = $storageService->getStocks();

    }

    public function render()
    {
        return view('livewire.storage');
    }
}
