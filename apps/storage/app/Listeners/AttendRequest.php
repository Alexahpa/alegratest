<?php

namespace App\Listeners;

use App\Events\IngredientsRequested;
use App\Events\RequestCompleted;
use App\Services\StockManager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AttendRequest implements ShouldQueue
{
    use InteractsWithQueue;

    public $queue = 'storage';

    protected $service;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  IngredientsRequested  $event
     * @return void
     */
    public function handle(IngredientsRequested $event)
    {
        $service = new StockManager();
        $ingredients = $event->ingredients;
        $service->requestIngredients($ingredients);
        event(new RequestCompleted($event->orderId));
    }
}
