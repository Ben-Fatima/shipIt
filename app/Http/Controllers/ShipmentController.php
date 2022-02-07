<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\Truck;

class shipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::latest()->get();
        return view('shipments.index',[
            'shipments' => $shipments
        ]);
    }
    public function create()
    {
        return view("shipments.create",[
            'trucks' => Truck::all(),
            'clients' => Client::all()
        ]);
    }
    public function store(){
        $attributs = request()->validate([
            "status" => "required",
            "reference" => "required",
            "truck_id" => "required",
            "client_id" => "required",
        ]);
        $client = Client::where('name','=',request('client_id'))->first();
        $attributs['client_id'] = $client->id;
        Shipment::create($attributs);
        return redirect("/shipments");
    }
    public function delete($id){
        $shipment = Shipment::findOrFail($id);
        $shipment->delete();
        return redirect('/shipments');
    }
    public function addProducts($id){
        
        $shipment = Shipment::where('id',$id)->with('items.product')->first();
        return view('shipments.products',[
            'shipment' => $shipment,
            'products' => Product::all(),
        ]);
    }
    public function assignProducts($id)
    {
        $item = ShipmentItem::create([
            'shipment_id' => $id,
            'product_id' => request('product_id'),
            'quantity' => request('quantity')
        ]);
        return redirect('/shipments/'.$id);
    }
}
