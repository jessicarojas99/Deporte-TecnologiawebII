<?php

namespace App\Http\Controllers;

use App\Team;
use Dotenv\Result\Result;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show','index','search');
        $this->middleware('admin')->only('destroy');
    }
    public function index()
    {
        return view('Equipo.mostrar');
    }
    public function listEquipo()
    {
        $team=Team::paginate(5);
        return view('Equipo.listEquipo',compact('team'));
    }
  
    public function create()
    {
        return view('Equipo.crear',
        [
            'team' => new Team
        ]);
    }
    public function search(Request $request)
    {
        return view('Equipo.mostrar',[
            'team'=>Team::name($request->get('name'))->paginate()
            ]);
    }
    
    public function store(Request $request)
    {
        $team=request()->validate(
            [
                'name'=>'required',
                'city'=>'required'
            ],
            [
                '*.required'=>'El campo es requerido',
            ]
    
        );
        if($request->ajax())
        {
            Team::create($team);
            return response()->json([
                "mensaje"=>$request->all()
            ]);
        }
        
        return redirect()->route('equipo.index')->with('status','El equipo se agrego con exito');

    }
    public function edit($id)
    {
        $teamitem=Team::find($id);
        return response()->json($teamitem);
        // return view('Equipo.editar',[
        //     'teamitem'=>$team
        // ]);
    }
    public function update(Request $request,$id )
    {
        if($request->ajax())
        {
            $teamitem=Team::FindOrFail($id);
            $input=$request->all();
            $result=$teamitem->fill($input)->save();

            if($result){
                return response()->json(['success'=>'true']);
            }
            else{
                return response()->json(['success'=>'false']);
            }
        }

        // $team->update(request()->validate(
        //     [
        //         'name'=>'required',
        //         'city'=>'required'
        //     ],
        //     [
        //         '*.required'=>'El campo es requerido',
                
        //     ]
        // ));
        // return redirect()->route('equipo.index',$team)->with('status','El equipo se actualizo con exito');
    }
    public function destroy($id)
    {
        $teamitem=Team::FindOrFail($id);
        $result=$teamitem->delete();

            if($result){
                return redirect()->route('equipo.index')->with('status','El equipo se elimino con exito');
            }
            else{
                return response()->json(['success'=>'false']);
            }
        // $team->delete();
        // return redirect()->route('equipo.index')->with('status','El equipo se elimino con exito');
    }
}
