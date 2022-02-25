<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receptionist;
use App\DataTables\ReceptionistDataTable;
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
        $data =Receptionist::all();
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $actionBtn = "<a  class='btn btn-primary'  href='/edit-receptionest/$row->id'>Edit</a>
                              <a  class='btn btn-success'  href='/show-receptionest/$row->id'>Show</a> 
                              <a  class='btn btn-danger'  href='/del-receptionest/$row->id'>Delete</a>
                              <a  class='btn btn-secondary'  href='/ban-receptionest/$row->id'>Ban</a>"; 
                           
                return $actionBtn;
            })->rawColumns(['action'])
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
}