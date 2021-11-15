<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' =>  $this->faker->numberBetween(0, 1),
            'recipe_id' => $this->faker->numberBetween(0, 7)
        ];
    }
}
