<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receptionist;
class ReceptionestController extends Controller
{
    public function manage(){
        $receptionests=Receptionist::get();
        return view('receptionest.manage',[
            'receptionests'=>$receptionests
        ]);
    }
    public function add(){
        return view('receptionest.add-update');
    }
    public function store(){
        $attripute=Request()->validate([
         'name' => 'required|min:6|max:16',
         'email' => 'required|email',
         'password' => 'required|min:6',
         'national_id' => 'required|min:14|max:14',
         'avatar' => 'required',
         'manager_id' => 'required',

        ]);
        $receptionist=Receptionist::create($attripute);
        $receptionist->assignRole('receptionist');
        return redirect('/mang-receptionest');
    }
 
    public function delete($id){
        Receptionist::find($id)->delete(); 
         return redirect('/mang-receptionest');
 
    }
    public function show($id){
         $receptionist=Receptionist::find($id); 
         return view('');
 
    }
    public function update($id){
         $receptionist=Receptionist::find($id); 
         return view('receptionest.add-update',[
             'receptionist'=>$receptionist
         ]);
 
    }
    public function save(){
         $receptionist=Receptionist::find(Request()->id); 
         $receptionist->name=Request()->name;
         $receptionist->email=Request()->email;
         $receptionist->save();
         return redirect('/mang-receptionest');
    }
}