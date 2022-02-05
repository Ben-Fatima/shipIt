<?php

namespace Database\Factories;

use App\Models\Truck;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' =>  Client::factory(),
            'truck_id' => Truck::factory(),
            'reference' => $this->faker->word(),
            'status' => 'created'
        ];
    }
}
