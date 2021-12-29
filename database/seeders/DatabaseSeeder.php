<?php

namespace Database\Seeders;

use App\Models\Camion;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\Stock;
use App\Models\User;
use App\Models\Warehouse;
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
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user3 = User::factory()->create();
        $user4 = User::factory()->create();
        $user5 = User::factory()->create();
        $user6 = User::factory()->create();
        $shipment1 = Shipment::factory()->create();
        $shipment2 = Shipment::factory()->create();
        $shipment3 = Shipment::factory()->create();
        $camion1 = Camion::factory()->create([
            'shipment_id'=> $shipment1->id
        ]);
        $camion2 = Camion::factory()->create([
            'shipment_id'=> $shipment2->id
        ]);
        $camion3 = Camion::factory()->create([
            'shipment_id'=> $shipment3->id
        ]);
        $product1= Product::factory()->create();
        $product2= Product::factory()->create();
        $product3= Product::factory()->create();
        $product4= Product::factory()->create();
        $product5= Product::factory()->create();
        $product6= Product::factory()->create();
        $product7= Product::factory()->create();
        $product8= Product::factory()->create();
        $product8= Product::factory()->create();
        $warehouse1= Warehouse::factory()->create(); 
        $warehouse2= Warehouse::factory()->create(); 
        $warehouse3= Warehouse::factory()->create(); 
        $stock1 = Stock::factory()->create([
            'product_id'=>$product1->id,
            'warehouse_id'=>$warehouse1->id
        ]);
        $stock_item= ShipmentItem::factory()->create([
            'product_id'=>$product2->id,
            'camion_id'=>$camion2->id,
            'shipment_id'=>$shipment2->id
        ]);
        
    }
    
}
