<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OrderTest extends TestCase
{
    
    use RefreshDatabase, WithFaker;
    /**
     *
     * @return void
     */
    public function test_an_order_has_a_recipe()
    {

        $recipe = Recipe::factory()->create();
        $order = Order::factory()->create([
            'recipe_id' => $recipe->id
        ]);

        $this->assertModelExists($order->plate);
        $this->assertInstanceOf(Recipe::class, $order->plate);
    }
}
