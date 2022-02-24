<?php

namespace App\Http\Controllers;
use App\Models\Manager;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Events\Registered;


class MangerController extends Controller
{
   public function manage(){
       $mangers=Manager::get();
       return view('manager.manage',[
           'mangers'=>$mangers
       ]);
   }
   public function add(){
       return view('manager.add-update');
   }
   public function store(){
       $attripute=Request()->validate([
        'name' => 'required|min:6|max:16',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'national_id' => 'required|min:14|max:14',
        'avatar' => 'required',
       ]);
       
       $manager=Manager::create($attripute);
       $manager->assignRole('manager');
       return redirect('/mang-manger');
    }

    public function delete($id){
        Manager::find($id)->delete(); 
        return redirect('/mang-manger');

    }
    public function display($id){
        $manager=Manager::find($id); 
        return view('');

    }
    public function update($id){
        $manager=Manager::find($id); 
        return view('manager.add-update',[
            'manger'=>$manager
        ]);

    }
    public function save(){
        $manager=Manager::find(Request()->id); 
        $manager->name=Request()->name;
        $manager->email=Request()->email;
        $manager->save();
        return redirect('/mang-manger');
    }
}