<?php

namespace App\Listeners;

use App\Events\RequestCompleted;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificacion implements ShouldQueue
{
    use InteractsWithQueue;

    public $queue = 'storage';

    /**
     * Handle the event.
     *
     * @param  RequestCompleted  $event
     * @return void
     */

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('KITCHEN_URL')
        ]);
    }


    public function handle(RequestCompleted $event)
    {
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode([
                    'orderId' => $event->orderId
                ])
            ];
            $uri =  "api/order/finishPreparation";
            $response = $this->client->post($uri, $options);
        } catch (Exception $e) {
            Log::error("Error reaching service", []);
            return -1;
        }
    }
}
