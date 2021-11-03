<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class IngredientsRequested
{
    use Dispatchable, SerializesModels;

    public $ingredients;
    public $orderId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ingredients, $orderId)
    {
        $this->ingredients = $ingredients;
        $this->orderId = $orderId;
    }
}
