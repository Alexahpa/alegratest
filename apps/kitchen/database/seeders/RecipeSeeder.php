<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            IngredientSeeder::class
        ]);

        $recipe1 = Recipe::firstOrCreate([
            'name' => 'Tallarines Rojos'
        ]);

        $recipe2 = Recipe::firstOrCreate([
            'name' => 'Ensalada'
        ]);

        $recipe3 = Recipe::firstOrCreate([
            'name' => 'Hamburguesa'
        ]);

        $recipe4 = Recipe::firstOrCreate([
            'name' => 'Arroz Saltado'
        ]);

        $recipe5 = Recipe::firstOrCreate([
            'name' => 'Papa rellena'
        ]);

        $recipe6 = Recipe::firstOrCreate([
            'name' => 'Pollo con queso'
        ]);

        $tomato = Ingredient::where('name', 'tomato')->first();
        $lemon = Ingredient::where('name', 'lemon')->first();
        $potato = Ingredient::where('name', 'potato')->first();
        $rice = Ingredient::where('name', 'rice')->first();
        $ketchup = Ingredient::where('name', 'ketchup')->first();
        $lettuce = Ingredient::where('name', 'lettuce')->first();
        $onion = Ingredient::where('name', 'onion')->first();
        $cheese = Ingredient::where('name', 'cheese')->first();
        $meat = Ingredient::where('name', 'meat')->first();
        $chicken = Ingredient::where('name', 'chicken')->first();

        $recipe1->ingredients()->attach($potato->id, ['quantity'=> 4]);
        $recipe1->ingredients()->attach($tomato->id, ['quantity'=> 2]);
        $recipe1->ingredients()->attach($cheese->id, ['quantity'=> 3]);

        $recipe2->ingredients()->attach($lemon->id, ['quantity'=> 1]);
        $recipe2->ingredients()->attach($ketchup->id, ['quantity'=> 3]);
        $recipe2->ingredients()->attach($lettuce->id, ['quantity'=> 4]);

        $recipe3->ingredients()->attach($onion->id, ['quantity'=> 1]);
        $recipe3->ingredients()->attach($meat->id, ['quantity'=> 2]);
        $recipe3->ingredients()->attach($potato->id, ['quantity'=> 5]);

        $recipe4->ingredients()->attach($rice->id, ['quantity'=> 1]);
        $recipe4->ingredients()->attach($chicken->id, ['quantity'=> 3]);
        $recipe4->ingredients()->attach($onion->id, ['quantity'=> 2]);

        $recipe5->ingredients()->attach($potato->id, ['quantity'=> 2]);
        $recipe5->ingredients()->attach($chicken->id, ['quantity'=> 3]);
        $recipe5->ingredients()->attach($tomato->id, ['quantity'=> 3]);

        $recipe6->ingredients()->attach($chicken->id, ['quantity'=> 3]);
        $recipe6->ingredients()->attach($cheese->id, ['quantity'=> 3]);
        $recipe6->ingredients()->attach($lettuce->id, ['quantity'=> 4]);
    }
}
