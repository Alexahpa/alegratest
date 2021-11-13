<?php

namespace App\Services;

use App\Interfaces\ProviderInterface;
use App\Models\Ingredient;
use App\Models\IngredientStock;
use App\Models\PurchaseHistory;
use App\Services\FoodProviders\PublicMarket\Market;

class StockManager
{
    protected $providers = [
        'market' => Market::class
    ];

    protected $provider;
    const MAX_ITERATIONS = 10000;

    public function __construct()
    {
        if (in_array(env('FOOD_PROVIDER', 'market'), array_keys($this->providers))) {
            $this->provider = new $this->providers[env('FOOD_PROVIDER', 'market')];
        }
    }

    public function requestIngredients($ingredients)
    {
        collect($ingredients)->each(function ($ingredient) {
            $count = $ingredient['count'];
            $ingredient_id = $ingredient['ingredient_id'];
            $ingredientStock = IngredientStock::where('ingredient_id', $ingredient_id)->first();

            if ($ingredientStock->stock > $count) {
                $ingredientStock->stock = $ingredientStock->stock - $count;
                $ingredientStock->save();
                return true;
            }

            $this->buyIngredient($ingredientStock, $count);
        });
    }


    private function buyIngredient(IngredientStock $ingredientStock, $count)
    {
        $ingredientName = $ingredientStock->ingredient->name;
        $stock = $ingredientStock->stock;
        $i = 0;
        while ($stock < $count || $i > self::MAX_ITERATIONS) {
            $buyed = $this->provider->buyIngredient($ingredientName);
            if ($buyed > 0) {
                $stock = $buyed + $stock;
                $this->logPurchase($ingredientStock->ingredient, $buyed);
            }
        }

        if ($stock >= $count) {
            $ingredientStock->stock = $stock;
            $ingredientStock->save();
            return;
        }

        Log::error("There's an error buying in the market");
    }


    private function logPurchase(Ingredient $ingredient, int $amount)
    {
        $purchasehistory = new PurchaseHistory();
        $purchasehistory->ingredient_id = $ingredient->id;
        $purchasehistory->amount = $amount;
        $purchasehistory->market = env('FOOD_PROVIDER', 'market');
        $purchasehistory->save();

    }
}
