<?php

namespace Tests\Unit\Services;

use App\Services\Statuses;
use PHPUnit\Framework\TestCase;

class StatusesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_in_progress_value_exists()
    {
        $this->assertIsInt(Statuses::IN_PROGRESS);
    }

    public function test_delivered_value_exists()
    {
        $this->assertIsInt(Statuses::DELIVERED);
    }
}
