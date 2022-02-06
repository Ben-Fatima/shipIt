<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => 'available',
            'max_weight' => $this->faker->numberBetween(1000000, 5000000),
            'height' => $this->faker->randomNumber(),
            'width' => $this->faker->randomNumber(),
            'depth' => $this->faker->randomNumber(),
            'longitude' => $this->faker->randomNumber(),
            'latitude' => $this->faker->randomNumber(),
        ];
    }
}
