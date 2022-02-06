<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'height'=>$this->faker->randomNumber(),
            'width'=>$this->faker->randomNumber(),
            'depth'=>$this->faker->randomNumber(),
            'weight'=>$this->faker->numberBetween(50, 10000),
            'quantity'=>$this->faker->numberBetween(1, 10000),
        ];
    }
}
