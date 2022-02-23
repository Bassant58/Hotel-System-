<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'password' , 'national_id'];

    public function manager(){

        return $this->belongsTo(Manager::class , 'manager_id' , 'id');
    }


    ///////////////// two pending ????? /////////////////////////

    public function user(){

        return $this->hasMany(User::class , 'manager_id' , 'id');
    }
}
