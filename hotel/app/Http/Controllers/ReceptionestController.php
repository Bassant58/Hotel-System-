<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receptionist;
use App\DataTables\ReceptionistDataTable;
use App\DataTables\UserDataTable;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Auth;

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
            return $receptionist->manager->name??null;
        })->rawColumns(['manager_name'])
        ->addColumn('created_at', function ($row){
            return $row->created_at->format('d-M-Y');
     })->rawColumns(['created_at'])
            ->addColumn('action', function ($row)
            {
                    if (Auth::guard('admin')->check()){
                       return   "<a  class='btn btn-primary'  href='/edit-receptionest/$row->id'>Edit</a>
                                 <a  class='btn btn-danger'  href='/del-receptionest/$row->id'>Delete</a>";}
                    elseif(Auth::guard('manager')->user()-> id == $row -> manager_id)  {
                         if ( $row->Ban_unBan == 'Ban'? $ban = 'Unban' : $ban = 'Ban' );
                            return   "<a  class='btn btn-primary'  href='/edit-receptionest/$row->id'>Edit</a>
                                      <a  class='btn btn-danger'  href='/del-receptionest/$row->id'>Delete</a>
                                      <a  class='btn btn-secondary' id='ban' href='/ban-receptionest/$row->id'>$ban</a>"; }
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
         'recp_img' => 'required',

        ]);
        $input = \request()->all();
        $receptionist = Receptionist::create($input);
        if(\request()->hasFile('recp_img') && \request()->file('recp_img')->isValid()){
            $receptionist->addMediaFromRequest('recp_img')->toMediaCollection('recp_img');

        $receptionist->assignRole('receptionist','receptionist');
        return redirect('/mang-receptionest');
    }
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
//         return $receptionist ;
         $receptionist->update(Request()->all());
         return redirect('/mang-receptionest');
    }
    public function ban($id){
        $receptionist=Receptionist::find($id);
        if( $receptionist->Ban_unBan=='Ban'){
            $receptionist->Ban_unBan='Unban';
            }
        else{
            $receptionist->Ban_unBan='Ban';
        }
        $receptionist->save();
        return redirect('/mang-receptionest');
    }


    // See approved Clients

    public function index(UserDataTable $dataTable){
        return view('receptionest.userData');
    }

    public function clientData(){
        $RecId = Auth::guard('receptionist')->user()->id;
        $RecUser = Receptionist::findOrfail($RecId);
        $Rec = $RecUser -> user ;
//        return $Rec ;
        return Datatables::of($Rec)
            ->make(true);
    }


}






