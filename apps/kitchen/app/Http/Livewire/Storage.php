<?php

namespace App\Http\Livewire;

use App\Models\IngredientStock;
use Livewire\Component;

class Storage extends Component
{
    public $storage = [];

    public function update()
    {
        $this->storage = IngredientStock::with('ingredient')->get();

    }

    public function render()
    {
        return view('livewire.storage');
    }
}
