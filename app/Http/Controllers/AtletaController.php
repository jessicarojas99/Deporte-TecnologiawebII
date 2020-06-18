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
        return view('Atleta.lista',[
            'atleta'=>Athlete::paginate()
        ]);
    }
    public function search(Request $request)
    { 
        return view('Atleta.lista',[
            'atleta'=>Athlete::name($request->get('name'))->paginate()
            ]);
    }
    public function show(Athlete $athlete)
    {
        $deporte=Sport::all();
        $equipo=Team::all();
        //sport variable para view
        return view('Atleta.show',[
            'athlete'=>$athlete
        ],compact('deporte','equipo'));
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
