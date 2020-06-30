<?php

namespace App\Http\Controllers;

use App\Team;
use Dotenv\Result\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show','index','search');
        $this->middleware('admin')->only('destroy');
    }
    public function index()
    {
        $team = Team::paginate(8);
        return view('equipo.mostrar', compact('team'));
    }
    public function listEquipo()
    {
        $team=Team::paginate(5);
        return view('Equipo.listEquipo',compact('team'));
    }
  
    public function create()
    {
        return view('Equipo.crear');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $salida="";
            $name=$request->get('name');
            $city=$request->get('city');
            $teams=Team::name($name)->city($city)->paginate(5);
     
            if($teams)
            {
                foreach($teams as $team){
                    $salida.='<tr>
                            <td>' .$team->id. '</td>
                            <td>' .$team->name. '</td>
                            <td>' .$team->city. '</td>
                            </tr>';
                }
                return response($salida);
            }
            //return response()->json($teams);
        }
        else{
            return response()->json(['false'=>'No hay datos']);
        }
       
    }
   
    public function store(Request $request)
    {
      
        if($request->ajax())
        {
            $result=Team::create($request->all());
            if($result){
                return response()->json(['success'=>'true']);
            }
            else{
                return response()->json(['success'=>'false']);
            }
        }
        
       // return redirect()->route('equipo.index')->with('status','El equipo se agrego con exito');

    }
    public function edit($team)
    {
        $teamitem=Team::find($team);
        return response()->json($teamitem);
        // return view('Equipo.editar',[
        //     'teamitem'=>$team
        // ]);
    }
    public function update(Request $request,$id)
    {
        if($request->ajax())
        {
            $team=Team::FindOrFail($id);
            $input=$request->all();
            $result=$team->fill($input)->save();

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
        $team=Team::FindOrFail($id);
        $result=$team->delete();

        if($result){
            return response()->json(['success'=>'true']);
        }
        else{
            return response()->json(['success'=>'false']);
        }
        // $team->delete();
        // return redirect()->route('equipo.index')->with('status','El equipo se elimino con exito');
    }
}
