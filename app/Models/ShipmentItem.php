<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function shipment(){
        return $this->belongsTo(Shipment::class);
    }
}
