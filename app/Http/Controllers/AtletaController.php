<?php

namespace App\Http\Controllers;

use App\Athlete;
use App\Sport;
use App\Team;
use Illuminate\Http\Request;

class AtletaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show','index','search');
        $this->middleware('admin')->only('destroy');
    }
    public function index()
    {
        $data=Athlete::join('sports','athletes.sport_id','=','sports.id')
        ->join('teams','athletes.team_id','=','teams.id')
        ->select('athletes.id','athletes.name','athletes.lastname','athletes.ci','athletes.gender',
        'athletes.height','athletes.weight','athletes.birthdate','sports.name as sportname','teams.name as teamname')
        ->get();
        return view('Atleta.lista',[
            'atleta'=>Athlete::paginate()
        ],compact('data'));
    }
    public function search(Request $request)
    { 
    
            $name=$request->get('name');
            $tipo=$request->get('tipo');

       $data=Athlete::athlete($tipo,$name)->paginate(5);
        return view('Atleta.lista',compact('data'));
    }
    public function show(Athlete $athlete)
    {
        
        //sport variable para view
        return view('Atleta.show',[
            'athlete'=>$athlete
        ]);
    }
    public function create()
    {
        
        $deporte=Sport::all();
        $equipo=Team::all();
        return view('Atleta.Atleta',
        [
            'atleta' => new Athlete
        ],compact('deporte','equipo'));   
    }
  
    public function store()
    {
        Athlete::create(request()->all());
        //Athlete::create($atleta);
        return redirect()->route('atleta.index')->with('status','El atleta se agrego con exito');
       $atleta= request()->validate(
            [
                'name'=>'required',
                'lastname'=>'required',
                'ci'=>'required|integer',
                'gender'=>'required|in:masculino,femenino',
                'height'=>'required|integer',
                'weight'=>'required|integer',
                'birthdate'=>'required|date',
                'sport'=>'required',
                'team'=>'required',
               
            ],
            [
               'ci.integer'=>'Debe ingresar numeros',
               'weight.integer'=>'Debe ingresar numeros',
               'height.integer'=>'Debe ingresar numeros',
               'gender.in'=>'Debe elegir una opcion',
                '*.required'=>'El campo es requerido',
                
            ]

        );
        

    }
    public function edit(Athlete $athlete)
    {
        $deporte=Sport::all();
        $equipo=Team::all();
        return view('Atleta.editar',[
            'atleteitem'=>$athlete
        ],compact('deporte','equipo'));
    }
    public function update(Athlete $athlete)
    {
        $athlete->update(request()->all());
            return redirect()->route('atleta.index',$athlete)->with('status','El atleta se actualizo con exito');
    }
    public function destroy(Athlete $athlete)
    {
        $athlete->delete();
        return redirect()->route('atleta.index')->with('status','El atleta se elimino con exito');
    }
}
