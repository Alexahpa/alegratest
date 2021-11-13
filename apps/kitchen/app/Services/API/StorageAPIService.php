<?php

namespace App\Services\API;

use GuzzleHttp\Client;


class StorageAPIService
{
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => env('STORAGE_URL')
        ]);
    }

    public function getStocks()
    {
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ];
            $uri =  "/api/ingredients-stock";
            $response = $this->httpClient->get($uri, $options);
            if ($response->getStatusCode() == 200) {
                $resposeBody = json_decode($response->getBody());
                return $resposeBody->stocks;
            }
            return [];
        } catch (Exception $e) {
            Log::error("Error reaching service", []);
            return [];
        }
    }



    public function getPurchases()
    {
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ];
            $uri =  "/api/purchases";
            $response = $this->httpClient->get($uri, $options);
            if ($response->getStatusCode() == 200) {
                $resposeBody = json_decode($response->getBody());
                return $resposeBody->purchases;
            }
            return [];
        } catch (Exception $e) {
            Log::error("Error reaching service", []);
            return [];
        }
    }
}
