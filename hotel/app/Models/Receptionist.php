<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Receptionist extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'password' , 'national_id' , 'avatar'];

    public function manager(){

        return $this->belongsTo(Manager::class , 'manager_id' , 'id');
    }


    ///////////////// two pending ????? /////////////////////////

    public function user(){

        return $this->hasMany(User::class , 'user_id' , 'id');
    }


    public function reservation(){

        return $this->hasMany(Reservation::class , 'receptionist_id' , 'id');
    }
}
