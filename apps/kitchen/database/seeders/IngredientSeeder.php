<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::firstOrCreate([
            'name' => 'tomato'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'lemon'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'potato'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'rice'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'ketchup'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'lettuce'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'onion'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'cheese'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'meat'
        ]);

        Ingredient::firstOrCreate([
            'name' => 'chicken'
        ]);
    }
}
