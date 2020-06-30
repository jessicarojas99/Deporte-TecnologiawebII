<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

            $action = '<a class="btn btn-outline-dark" id="show-user" data-toggle="modal" data-id='.$row->id.'><i class="fas fa-eye"></i></a>
            <a class="btn btn-outline-info" id="edit-user" data-toggle="modal" data-id='.$row->id.'>  <i class="far fa-edit"></i></a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a id="delete-user" data-id='.$row->id.' class="btn btn-outline-danger delete-user"> <i class="far fa-trash-alt"></i></a>';

            return $action;

            })
            ->rawColumns(['action'])
            ->make(true);
         }

        return view('users');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'rol' => 'required',
            'email' => 'required',
        ],
        [
            '*.required'=>'Debe ingresar sus datos',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $uId = $request->user_id;
        User::updateOrCreate(['id' => $uId],['name' => $request->name, 'email' => $request->email,'rol' => $request->rol,'password' => Hash::make($request['password'])]);
        return response()->json(['success'=>'Guardado correctamente']);
        
    }

    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();

        return response()->json($user);
        //return view('users.show',compact('user'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function edit($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();

        return response()->json($user);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function destroy($id)
    {
        $user = User::where('id',$id)->delete();
        
        return response()->json($user);
    //return redirect()->route('users.index');
    }
}