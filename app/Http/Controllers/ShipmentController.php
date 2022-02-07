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
        $shipment = Shipment::findOrFail($id);
        $items = ShipmentItem::create([
            'shipment_id' => $shipment->id
        ]);
        return view('shipments.products',[
            'shipment' => $shipment,
            'products' => Product::all(),
            'items' => $items
        ]);
    }
    public function assignProducts($id)
    {
        $shipment = Shipment::findOrFail($id);
        $items = ShipmentItem::where('shipment_id',$shipment->id)->first();
        $product = Product::where('name',request('product_id'))->first();
        $items->product_id = $product->id;
        $items->quantity = intval(request('quantity'));
        $items->save();
        return redirect('/shipments/'.$id);
    }
}
