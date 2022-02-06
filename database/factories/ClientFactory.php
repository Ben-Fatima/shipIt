<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'latitude' => random(32, 34),
            'longitude' => - random(4, 7),
        ];
    }
}

function random($min, $max) {
    return $min + ($max - $min) * (mt_rand() / mt_getrandmax());
}
