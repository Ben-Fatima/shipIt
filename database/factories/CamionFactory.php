<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CamionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shipment_id'=>Shipment::factory(),
            'capacity'=>$this->faker->randomNumber(),
            'height'=>$this->faker->randomNumber(),
            'width'=>$this->faker->randomNumber(),
            'depth'=>$this->faker->randomNumber(),
            'longitude'=>$this->faker->randomNumber(),
            'latitude'=>$this->faker->randomNumber(),
        ];
    }
}
