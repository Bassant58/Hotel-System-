<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserReservationController extends Controller
{
    public function getRooms(){
    
       $room =  DB::table('rooms')
        ->where('status','=' , 'available')
        ->get();
        return view('GuestViews.rooms' , compact('room'));
    }

    public function showOneRoom($id){
        $room = Room::findOrFail($id);
        return view('GuestViews.reservation' , compact('room'));
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

    public function getAllReservations($id){
        $user = Reservation::with('user')
        ->where('user_id','=' ,$id)
        ->get();
        return view('GuestViews.showReservations' , compact('user'));
    }


    public function index(){
        return view('stripe');
    }
    public function paymentWithStripe(Request $request){
        return $request->all();
    }
}
