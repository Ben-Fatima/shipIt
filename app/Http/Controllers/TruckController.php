<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Truck;


class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::latest()->get();
        return view('trucks.index',['trucks'=>$trucks]);
    }
    public function create()
    {
        return view("trucks.create");
    }
    public function store()
    {
        $attributs = request()->validate([
            "status" => "required",
            "max_weight" => "required",
            "height" => "required",
            "width" => "required",
            "depth" => "required",
            "latitude" => "required",
            "longitude" => "required",
        ]);
        Truck::create($attributs);
        return redirect("/trucks");
    }
    public function delete($id){
        $truck = Truck::findOrFail($id);
        $truck->delete();
        return redirect('/trucks');
    }
    public function returnTruck($id){
        $truck = Truck::findOrFail($id);
        $shipments = Shipment::all();
        foreach($shipments as $shipment){
            if(isset($shipment->truck->id) && $shipment->truck->id == $truck->id){
                $shipment->status = 'shipped';
                $shipment->truck_id = NULL;
                $shipment->save();
            }
        }
        if($truck->status == 'pending'){
            $truck->status = 'available';
        $truck->save();
        return redirect('/trucks');
        }else{
            dd('Error!');
        }
        
    }
   
}
