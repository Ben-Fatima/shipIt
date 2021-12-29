<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference'=> $this->faker->name(),
            'address'=> $this->faker->address(),
            'longitude'=>$this->faker->randomNumber(),
            'latitude'=>$this->faker->randomNumber(),
        ];
    }
}
