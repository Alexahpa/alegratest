<?php

namespace Tests\Feature;

use App\Jobs\PrepareOrder;
use App\Models\Order;
use App\Models\Recipe;
use App\Services\Statuses;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery as m;
use Tests\TestCase;

class OrderTest extends TestCase
{

    use RefreshDatabase, WithFaker;
    /**
     *
     * @return void
     */
    public function test_prepare_order_sending_to_kitchen()
    {
        $this->seed();

        $job = m::mock('overload:' . PrepareOrder::class);
        $job->shouldReceive('dispatch')->andReturn(m::self())->once();
        $job->shouldReceive('onQueue')->with('kitchen');


        $response = $this->postJson('api/order/prepare', []);

        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
    }


    /**
     *
     * @return void
     */
    public function test_finish_preparation_change_order_status()
    {
        $this->seed();

        $recipe = Recipe::inRandomOrder()->first();
        $order = Order::factory()->create(['status' => Statuses::IN_PROGRESS]);
        $response = $this->postJson('api/order/finishPreparation', [
            'orderId' => $order->id,
            'recipe_id' => $recipe->id
        ]);

        $response->assertStatus(200)->assertJson([
            'success' => true,
            'orderId' => $order->id
        ]);
        $order->refresh();
        $this->assertEquals($order->status, Statuses::DELIVERED);
    }
}
