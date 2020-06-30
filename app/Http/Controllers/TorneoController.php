<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;
use Yajra\Datatables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;

class TorneoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show','index','search','store');
        $this->middleware('admin')->only('destroy');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tournament::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

            $action = '<a class="btn btn-outline-dark" id="show-torneo" data-toggle="modal" data-id='.$row->id.'><i class="fas fa-eye"></i></a>
            <a class="btn btn-outline-info" id="edit-torneo" data-toggle="modal" data-id='.$row->id.'>  <i class="far fa-edit"></i></a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a id="delete-torneo" data-id='.$row->id.' class="btn btn-outline-danger delete-edit"> <i class="far fa-trash-alt"></i></a>';

            return $action;

            })
            ->rawColumns(['action'])
            ->make(true);
         }

        return view('Torneo.mostrar');
    }
   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'startdate' => 'required',
            'finishdate' => 'required',
            
        ],[
            'name.required' =>'el nombre es obligatorio',
            'startdate.required' =>'la fecha de inicio es obligatorio',
            'finishdate.required' =>'la fecha de finalizacion es obligatorio',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $TId = $request->torneo_id;
       Tournament::updateOrCreate(['id' => $TId],['name' => $request->name, 'startdate' => $request->startdate,'finishdate' => $request->finishdate]);
        return response()->json(['success'=>'Guardado correctamente']);

    }
    public function show($id)
    {
        $where = array('id' => $id);
        $torneo = Tournament::where($where)->first();

        return response()->json($torneo);
        //return view('users.show',compact('user'));
    }
    
    public function edit($id)
    {
        $where = array('id' => $id);
        $torneo = Tournament::where($where)->first();

        return response()->json($torneo);
    }
    public function destroy($id)
    {
        $torneo = Tournament::where('id',$id)->delete();
        
        return response()->json($torneo);
    }

}
