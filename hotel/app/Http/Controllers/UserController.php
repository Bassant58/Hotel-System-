<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use DataTables;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function manage(UserDataTable $dataTable){
        return view('guest.manage');
    }

    public function getUserData(){
        $data = User::with('receptionist');
        return Datatables::of($data)
        ->addColumn('receptionist_name', function (User $user) {
            return $user->receptionist->name;
        })->rawColumns(['receptionist_name'])
            ->addColumn('action', function ($row) {
                if (Auth::guard('receptionist')->user()){
                    return   "<a  class='btn btn-primary'  href='/accept/$row->id'>Accept</a>
                              ";}                               
            })->rawColumns(['action'])
            ->make(true);
    }

     public function delete($id){
         User::find($id)->delete();
         return redirect('/mang-user');

     }
     public function display($id){
         $user=User::find($id);
         return view('');

     }
    public function accept($id){

        $user=User::find($id);
        $user->status='accept';
        $user->receptionist_id= Auth::guard('receptionist')->user()->id ;
        $user->save();
        return redirect('/mang-user');

    }
    public function pending(){
        return view('pending');
    }
}
