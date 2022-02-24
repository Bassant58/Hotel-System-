<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function manage(){
        $guests=User::get();
        return view('user.manage',[
            'guests'=>$guests
        ]);
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
}