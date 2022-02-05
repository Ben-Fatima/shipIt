<?php

namespace Database\Seeders;

use App\Models;
use App\Models\Client;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        $product = Product::factory()->create();
        $client = Client::factory()->create();
        $truck = Truck::factory()->create();
        
        $ship = Shipment::factory()->create([
            'truck_id' => $truck->id,
            'client_id' => $client->id
        ]);
        $items = ShipmentItem::factory()->create([
            'shipment_id' => $ship->id,
            'product_id' => $product->id
        ]);
        
    }
    
}
