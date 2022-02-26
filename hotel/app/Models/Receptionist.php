<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Receptionist extends Authenticatable
{
    use HasFactory,HasRoles;
    // protected $guard_name = 'web';

    protected $fillable = ['name' , 'email' , 'password' , 'national_id' , 'avatar','manager_id'];

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
