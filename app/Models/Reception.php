<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;
    public function Client(){
        return $this->belongsTo(Client::class);
    }
    public function Room(){
        return $this->belongsTo(Room::class);
    }
    public function ReceptionProducts(){
        return $this->hasMany(ReceptionProduct::class)->with(['Product']);
    }
}
