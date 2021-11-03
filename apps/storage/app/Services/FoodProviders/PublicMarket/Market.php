<?php

namespace App\Services\FoodProviders\PublicMarket;

use App\Interfaces\ProviderInterface;
use App\Models\IngredientStock;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Market implements ProviderInterface
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://recruitment.alegra.com/api/'
        ]);
    }

    public function buyIngredient(string $ingredientName)
    {

        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'query' => [
                    'ingredient' => $ingredientName
                ]
            ];
            $uri =  "farmers-market/buy";
            $response = $this->client->get($uri, $options);
            $itemStock = json_decode($response->getBody());
            return $itemStock->quantitySold;
        } catch (Exception $e) {
            Log::error("Error reaching external endpoint", []);
            return -1;
        }
    }
}
