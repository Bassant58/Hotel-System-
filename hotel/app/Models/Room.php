<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['capacity' , 'price'];



    public function manager(){

        return $this->belongsTo(Manager::class , 'manager_id' , 'id');
    }


    public function floor(){

        return $this->belongsTo(Floor::class , 'floor_id' , 'id');
    }


    public function reservation(){

        return $this->hasMany(Reservation::class , 'room_id' , 'id');
    }

}
