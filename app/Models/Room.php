<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function Nivel(){
        return $this->belongsTo(Nivel::class);
    }
    public function Detail(){
        return $this->belongsTo(Detail::class);
    }
    public function Reservations(){
        return $this->hasMany(Reservation::class)->where('state',1);
    }
    public function Reception(){
        return $this->hasOne(Reception::class)->with(['Client','ReceptionProducts'])->where([['state',1],['active',1]])->orderBy('id','desc');
    }
    public function ReceptionWithoutProducts(){
        return $this->hasOne(Reception::class)->with(['Client'])->where([['state',1],['active',1]])->orderBy('id','desc');
    }
}
