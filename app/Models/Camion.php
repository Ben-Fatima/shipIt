<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;
    public function shipments(){
        return $this->hasOne(Shipment::class);
    }
    public function warehouses(){
        return $this->belongsTo(Warehouse::class);
    }
}
