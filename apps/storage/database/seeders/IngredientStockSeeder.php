<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientStock;
use Illuminate\Database\Seeder;

class IngredientStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = collect(Ingredient::all());
        $ingredients->each(function ($ingredient) {
            $stock = new IngredientStock();
            $stock->ingredient_id = $ingredient->id;
            $stock->stock = 5;
            $stock->save();
        });
    }
}
