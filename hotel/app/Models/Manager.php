<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Manager extends Model
{
    use HasFactory,HasRoles;
    protected $guard_name = 'web';
    protected $fillable = ['name' , 'email' , 'password' , 'national_id' , 'avatar'];


    public function receptionist(){

        return $this->hasMany(Receptionist::class , 'manager_id' , 'id');
    }

    public function room(){
        
        return $this->hasMany(Room::class , 'manager_id' , 'id');
    }

    public function floor(){
        
        return $this->hasMany(Floor::class , 'manager_id' , 'id');
    }

    public function setPasswordAttribute($password){
        $this->attributes['password']=bcrypt($password);
    }
    public function setNational_IdAttribute($national_id){
        $this->attributes['national_id']=bcrypt($national_id);
    }
}