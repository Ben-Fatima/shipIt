<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'role' => 'administrateur',
            'password' => Hash::make('admin')
        ]);

        $products = Product::factory(10)->create();
        $clients = Client::factory(10)->create();
        Truck::factory(5)->create();

        for ($i = 0; $i < 20; $i++) {
            $shipment = Shipment::factory()->create([
                'client_id' => $clients[$i % 10]
            ]);
            for ($j = 0; $j < 5; $j++) {
                ShipmentItem::factory()->create([
                    'shipment_id' => $shipment->id,
                    'product_id' => $products[(5 * $i + $j) % 10]
                ]);
            }
        }
    }
}
