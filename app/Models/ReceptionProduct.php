<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptionProduct extends Model
{
    use HasFactory;
    public function Producto(){
        return $this->belongsTo(Product::class);
    }
}
