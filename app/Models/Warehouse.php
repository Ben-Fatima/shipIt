<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    public function camions(){
        return $this->hasMany(Camion::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}