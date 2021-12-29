<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>Product::factory(),
            'warehouse_id'=>Warehouse::factory(),
            'quantity'=>$this->faker->randomNumber()
        ];
    }
}
