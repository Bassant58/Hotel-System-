<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'manager_id'];


    public function manager(){

        return $this->belongsTo(Manager::class , 'manager_id' , 'id');
    }


    public function room(){

        return $this->hasMany(Room::class , 'floor_id' , 'id');
    }
}
