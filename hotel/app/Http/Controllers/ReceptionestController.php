<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receptionist;
use App\DataTables\ReceptionistDataTable;
use App\DataTables\UserDataTable;
use App\Models\User;
use DataTables;
class ReceptionestController extends Controller
{
    public function manage(ReceptionistDataTable $dataTable){
        return view('receptionest.manage');
    }
    public function add(){
        return view('receptionest.add-update');
    }

    public function getReceptionestData(){
        $data =Receptionist::with('manager');
        return Datatables::of($data)
        ->addColumn('manager_name', function (Receptionist $receptionist) {
            return $receptionist->manager->name;
        })->rawColumns(['manager_name'])
        ->addColumn('created_at', function ($row){
            return $row->created_at->format('d-M-Y');
     })->rawColumns(['created_at'])
            ->addColumn('action', function ($row) {
                $actionBtn = "<a  class='btn btn-primary'  href='/edit-receptionest/$row->id'>Edit</a>
                              <a  class='btn btn-success'  href='/show-receptionest/$row->id'>Show</a> 
                              <a  class='btn btn-danger'  href='/del-receptionest/$row->id'>Delete</a>
                              <a  class='btn btn-secondary'  href='/ban-receptionest/$row->id'>Ban</a>"; 
                           
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
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
         $receptionist->update(Request()->all());
         return redirect('/mang-receptionest');
    }
    public function ban($id){
        $receptionist=Receptionist::find($id);
        if( $receptionist->Ban_unBan=='Baned'){
            $receptionist->Ban_unBan='unBaned';
        }
        else{
            $receptionist->Ban_unBan='Baned';
        }
        $receptionist->save();
        return redirect('/mang-receptionest');
    }


    // See approved Clients

    public function index(UserDataTable $dataTable){
        return view('receptionest.userData');
    }

    public function clientData(){
        $data = User::all();
        return Datatables::of($data)
            ->make(true);
    }


}





 