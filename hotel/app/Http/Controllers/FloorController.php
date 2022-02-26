<?php

namespace App\Http\Controllers;
use App\Models\Floor;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use App\DataTables\FloorDataTable;
use DataTables;
use Illuminate\Support\Facades\Auth;

class FloorController extends Controller
{
    public function manage(FloorDataTable $dataTable){
        return view('floor.manage');
       }

       public function getFloorData(){
       $data = Floor::with('manager');
       return Datatables::of($data)
       ->addColumn('manager_name', function (Floor $floor) {
        return $floor->manager->name??null;
       })->rawColumns(['manager_name'])
           ->addColumn('action', function ($row) {
            if (Auth::guard('admin')->user()){
                return  "<a  class='btn btn-primary'  href='/edit-floor/$row->id'>Edit</a>
                         <a  class='btn btn-danger'  href='/del-floor/$row->id'>Delete</a> 
                       ";} elseif(Auth::guard('manager')->user()->id == $row -> manager_id)  {
                        return  "<a  class='btn btn-primary'  href='/edit-floor/$row->id'>Edit</a>
                                 <a  class='btn btn-danger'  href='/del-floor/$row->id'>Delete</a> 
                      "; }   
             
           })->rawColumns(['action'])
           ->make(true);
        }

        public function add(){
            return view('floor.add-update');
        }

    public function store(){
        $faker = Faker::create();
        Floor::create([
            'floor_code'=>$faker->unique()->numberBetween(1000, 9999),
            'name'=>Request()->name,
            'manager_id'=>Auth::guard('manager')->user()->id,
        ]);
        return redirect('/mang-floor');
    }

    public function delete($id){
        $floor= Floor::find($id); 
         if($floor->room != '[]'){
             return redirect()->back()->with('message', 'IT WORKS!');
         }
         else{
            $floor->delete(); 
            return redirect('/mang-floor');
         }
    }
     public function update($id){
        $floor=Floor::find($id); 
        return view('floor.add-update',[
            'floor'=>$floor
        ]);
   }
   public function save(){
        $floor=Floor::find(Request()->id); 
        $floor->update(Request()->all());
        return redirect('/mang-floor');
   }
}
