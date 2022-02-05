<?php

namespace App\Http\Controllers;

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
   
}
