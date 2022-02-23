<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;


    protected $fillable = ['name' , 'email' , 'password' , 'national_id'];


    public function receptionist(){

        return $this->hasMany(Receptionist::class , 'manager_id' , 'id');
    }

    public function room(){
        
        return $this->hasMany(Room::class , 'manager_id' , 'id');
    }

    public function floor(){
        
        return $this->hasMany(Floor::class , 'manager_id' , 'id');
    }

}
