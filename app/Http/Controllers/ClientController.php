<?php

namespace App\Http\Controllers;

use App\Models\Client;


class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('clients.index',['clients'=>$clients]);
    }
    public function create()
    {
        return view("clients.create");
    }
    public function store()
    {
        //dd(request()->all());
        $attributs = request()->validate([
            "name" => "required",
            "address" => "required",
            "latitude" => "required",
            "longitude" => "required",
        ]);
        Client::create($attributs);
        return redirect("/clients");
    }
    public function edit($id){
        $client = Client::findOrFail($id);
        return view('clients.edit',['client'=>$client]);
    }
    public function delete($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/clients');
    }
}
