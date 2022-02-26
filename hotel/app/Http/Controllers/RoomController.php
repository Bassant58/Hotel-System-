<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Floor;
use Faker\Factory as Faker;
use App\DataTables\RoomDataTable;
use DataTables;

class RoomController extends Controller
{
    public function manage(RoomDataTable $dataTable){
        return view('room.manage');
       }
    
       public function getRoomData(){
       $data =Room::with('floor');
       return Datatables::of($data)
       ->addColumn('floor_name', function (Room $room) {
        return $room->floor->name;
       })->rawColumns(['floor_name'])
           ->addColumn('action', function ($row) {
               $actionBtn = "<a  class='btn btn-primary'  href='/edit-room/$row->id'>Edit</a>
                             <a  class='btn btn-danger'  href='/del-room/$row->id'>Delete</a> 
                          ";
               return $actionBtn;
           })->rawColumns(['action'])
           ->make(true);
        }

        public function add(){
            $floors= Floor::all();
            return view('room.add-update',[
               'floors'=>$floors
            ]);
        }
    
    public function store(){
        $faker = Faker::create();
        Room::create([
            'room_code'=>$faker->unique()->numberBetween(1000, 9999),
            'price'=>Request()->price,
            'capacity'=>Request()->capacity,
            'floor_id'=>Request()->floor_id,
            'manager_id'=>auth()->user()->id,
        ]);
        return redirect('/mang-room');
    }

    public function delete($id){
        $room= Room::find($id); 
         if($room->reservation != '[]'){
             return redirect()->back()->with('message', 'IT WORKS!');
         }
         else{
            $room->delete(); 
            return redirect('/mang-room');
         }
    }
     public function update($id){
        $room=Room::find($id); 
        $floors= Floor::all();
        return view('room.add-update',[
            'room'=>$room,
            'floors'=>$floors
        ]);
   }
   public function save(){
        $floor=Room::find(Request()->id); 
        $floor->update(Request()->all());
        return redirect('/mang-room');
   }
}
