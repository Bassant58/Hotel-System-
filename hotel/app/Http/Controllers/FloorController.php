<?php

namespace App\Http\Controllers;
use App\Models\Floor;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use App\DataTables\FloorDataTable;
use DataTables;

class FloorController extends Controller
{
    public function manage(FloorDataTable $dataTable){
        return view('floor.manage');
       }
    
       public function getFloorData(){
       $data = Floor::with('manager');
       return Datatables::of($data)
       ->addColumn('manager_name', function (Floor $floor) {
        return $floor->manager->name;
       })->rawColumns(['manager_name'])
           ->addColumn('action', function ($row) {
               $actionBtn = "<a  class='btn btn-primary'  href='/edit-floor/$row->id'>Edit</a>
                             <a  class='btn btn-danger'  href='/del-floor/$row->id'>Delete</a> 
                          ";
               return $actionBtn;
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
            'manager_id'=>auth()->user()->id,
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
