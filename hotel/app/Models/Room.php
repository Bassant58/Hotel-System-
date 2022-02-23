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

}
