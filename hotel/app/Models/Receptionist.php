<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Receptionist extends Authenticatable implements HasMedia
{
    use HasFactory,HasRoles , InteractsWithMedia;

    protected $fillable = ['name' , 'email' , 'password' , 'national_id' ,'manager_id','Ban_unBan'];

    public function manager(){

        return $this->belongsTo(Manager::class , 'manager_id' , 'id');
    }


    ///////////////// two pending ????? /////////////////////////

    public function user(){

        return $this->hasMany(User::class , 'receptionist_id' , 'id');
    }


    public function reservation(){

        return $this->hasMany(Reservation::class , 'receptionist_id' , 'id');
    }
}
