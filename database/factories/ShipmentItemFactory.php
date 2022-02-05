<?php

namespace Database\Factories;

use App\Models\Camion;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'shipment_id' => Shipment::factory(),
            'quantity'=>$this->faker->randomNumber()
        ];
    }
}
