<?php

namespace App\Http\Controllers;
use App\Models\Manager;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Events\Registered;
use App\DataTables\ManagerDataTable;
use DataTables;


class MangerController extends Controller
{
   public function manage(ManagerDataTable $dataTable){
    return view('manager.manage');
   }

   public function getManagerData(){
   $data =Manager::all();
   return Datatables::of($data)
       ->addColumn('action', function ($row) {
           $actionBtn = "<a  class='btn btn-primary'  href='/edit-manager/$row->id'>Edit</a>
                         <a  class='btn btn-success'  href='/show-manager/$row->id'>Show</a> 
                         <a  class='btn btn-danger'  href='/del-manager/$row->id'>Delete</a> 
                      "  ;
           return $actionBtn;
       })->rawColumns(['action'])
       ->make(true);
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
// lazm on delete set
    public function delete($id){
       $manager= Manager::find($id); 

        if($manager->receptionist){
            // return '<script type="text/javascript">alert("hello!");</script>';
            $manager->receptionist->manager_id=null;
            $manager->receptionist->save();
        }
        $manager->delete(); 
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