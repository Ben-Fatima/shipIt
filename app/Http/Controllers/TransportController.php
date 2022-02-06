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
            'trucks' => Truck::where('status', 'available')->get(),
            'shipments' => Shipment::with('items')->where('status', 'created')->get()
        ]);
    }

    public function assign() {
        foreach (request('trucks') as ['id' => $id, 'shipments' => $shipmentIds]) {
            foreach (Shipment::whereIn('id', $shipmentIds)->get() as $shipment) {
                $shipment->truck_id = $id;
                $shipment->status = 'assigned';
                $shipment->save();
            }
            $truck = Truck::findOrFail($id);
            $truck->status = 'pending';
            $truck->save();
        }
    }
}
