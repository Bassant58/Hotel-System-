<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use DataTables;

class UserController extends Controller
{
   
    public function manage(UserDataTable $dataTable){
        return view('guest.manage');
    }

    public function getUserData(){
        $data =User::all();
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $actionBtn = "<a  class='btn btn-primary'  href='/accept/$row->id'>Accept</a>"; 
                return $actionBtn;

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
     public function update($id){
         $user=User::find($id); 
         return view('user.update',[
             'user'=>$user
         ]);
 
     }
     public function save(){
         $user=User::find(Request()->id); 
         $user->status=Request()->status;
         $user->receptionist_id=Request()->receptionist_id;
         $user->save();
         return redirect('/mang-manger');
     }

    public function accept($id){
        $user=User::find($id); 
        $user->status='accept';
        $user->receptionist_id=auth()->user()->id;
        $user->save();
        return redirect('/mang-user');

    }
}