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
       $data =Floor::all();
       return Datatables::of($data)
           ->addColumn('action', function ($row) {
               $actionBtn = "<a  class='btn btn-primary'  href='/edit-manager/$row->id'>Edit</a>
                             <a  class='btn btn-danger'  href='/del-manager/$row->id'>Delete</a> 
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
}
