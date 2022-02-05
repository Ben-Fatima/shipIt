<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function display(){
        return view('transport.index',[
            'clients' => Client::all()
        ]);
    }
}
