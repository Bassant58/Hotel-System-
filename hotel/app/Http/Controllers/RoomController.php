<?php

namespace App\Http\Controllers;
use App\DataTables\RoomDataTable;
use App\DataTables\ManagerDataTable;
use Illuminate\Http\Request;
use App\Models\Manager;
use DataTables;
class RoomController extends Controller
{
    //
    // public function index(RoomDataTable $dataTable){
    //     // dd($room);
    //     // var_dump($room);
    //     return $dataTable->render('room');
        
    // }
    public function manager(){
        // return $dataTable->render('room');
        return view('room');
    }
    public function getRoomsManagerView()
    {
        // if ($request->ajax()) {
            $data =Manager::all();
            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/manager_datails/">Edit</a>  <a href="#">create</a>'  ;

                    return $actionBtn;
                })->rawColumns(['action'])
                ->make(true);
            //     ->editColumn('price', function (Room $room) {
            //         return  $room->price*0.01 . ' $';
            //     })
            //     ->addColumn('status', function (Room $room) {
            //         if ($room->status=="available") {
            //             return ('<font color="green"> '. $room->status .'</font>');
            //         } else {
            //             return ('<font color="red"> '. $room->status .'</font>');
            //         }
            //     })


                // ->rawColumns(['action','status'])
                // ->make(true)
                // ;
        // }
    }
}
