<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charge;
use Stripe ;
use Illuminate\Support\Facades\Session;

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
            
          if($companyNumber['capacity'] == $room->capacity) {
            return view('stripe',compact('room'));
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
        Stripe\Stripe::setApikey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
             "amount"=> Request()->amount*100,
             "currency"=>"usd",
             "source"=> $request->stripeToken,
             "description"=> "Try"
        ]);
        $room=Room::find(Request()->room_id);
        $room->status='unAvailable';
        $room->save();
        Reservation::create([
            'user_id'=>auth()->user()->id,
            'room_id'=> $room->id,
            'receptionist_id'=>1,
            'acompany_num'=>$room->capacity
        ]);
       return redirect()->route('room.all')->with('message','done');
           }
}
