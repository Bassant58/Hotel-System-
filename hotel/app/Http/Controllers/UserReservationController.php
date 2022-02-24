<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserReservationController extends Controller
{
    public function getRooms(){
    
       $room =  DB::table('rooms')
        ->where('status','=' , 'available')
        ->get();
        return view('room.rooms' , compact('room'));
    }

    public function showOneRoom($id){
        $room = Room::findOrFail($id);
        return view('room.reservation' , compact('room'));
    }

    public function checkNumberWithRoomCapacity(Request $request , $id){
        $room = Room::findOrFail($id);
        
        $companyNumber=$request->validate([
                'capacity' => 'required',
               ]);
            
            // dd($companyNumber['capacity']);
          if($companyNumber['capacity'] == $room->capacity) {
              return back()->with('matched', 'okay!');

          }

          return back()->with('not match', 'The number not much the room capacity!');
    }
}
