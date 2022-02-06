<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\Truck;

class TransportController extends Controller
{
    public function display(){
        return view('transport.index',[
            'warehouse' => [
                'latitude' => env('WAREHOUSE_LAT'),
                'longitude' => env('WAREHOUSE_LNG')
            ],
            'clients' => Client::all(),
            'products' => Product::all(),
            'trucks' => Truck::all(),
            'shipments' => Shipment::with('items')->where('status', 'created')->get()
        ]);
    }
}
