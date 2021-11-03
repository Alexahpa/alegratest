<?php

namespace App\Jobs;

use App\Models\Order;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PrepareOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $order;


    public function __construct(Order $order)
    {


        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client([
            'base_uri' => env('STORAGE_URL')
        ]);
        $this->order->refresh();
        $products = $this->order->plate->ingredients->map(function ($ingredient) {
            return ['ingredient_id' => $ingredient->id, 'count' => $ingredient->pivot->quantity];
        });

        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode([
                    'orderId' => $this->order->id,
                    'products' => $products
                ])
            ];
            $uri =  "/api/ingredients";
            $response = $client->post($uri, $options);
        } catch (Exception $e) {
            Log::error("Error reaching service", []);
        }
    }
}
