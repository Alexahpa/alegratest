<?php

namespace Tests\Unit\Services;

use App\Jobs\PrepareOrder;
use App\Models\Recipe;
use App\Models\Order;
use App\Services\KitchenService;
use App\Services\Statuses;
use Mockery as m;
use Tests\TestCase;

class KitchenServiceTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testPreparePlateAndDispatchJob()
    {
        $recipe = m::mock('overload:' . Recipe::class);
        $recipe->id = 10;
        $order = m::mock('overload:' . Order::class);
        $order->shouldReceive('save')->andSet('id', 100)->once();

        $job = m::mock('overload:' . PrepareOrder::class);
        $job->shouldReceive('dispatch')->andReturn(m::self());
        $job->shouldReceive('onQueue')->with('kitchen');

        $service = new KitchenService();
        $response = $service->preparePlate($recipe);
        $this->assertEquals($response, 100);
    }


    /**
     *
     * @return void
     */
    public function testChangeOrderStatusToDelivered()
    {
        $orderId = 1;
        $order = m::mock('overload:' . Order::class);
        $order->id = $orderId;
        $order->status = Statuses::IN_PROGRESS;

        $service = new KitchenService();
        $order->shouldReceive('find')->with($orderId)->once()->andReturn(m::self());
        $order->shouldReceive('save');

        $response = $service->changeStatus($orderId);
        $this->assertEquals($response, $orderId);
        $this->assertEquals($order->status, Statuses::DELIVERED);
    }
}
