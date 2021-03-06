<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function truck(){
        return $this->belongsTo(Truck::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function items(){
        return $this->hasMany(ShipmentItem::class);
    }
}
