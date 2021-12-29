<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentItem extends Model
{
    use HasFactory;
    public function camions(){
        return $this->belongsTo(Camion::class);
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
    public function shipments(){
        return $this->belongsTo(Shipment::class);
    }
}
