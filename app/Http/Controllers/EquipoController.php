<?php

namespace App\Http\Controllers;

use App\Team;
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
        return view('Equipo.mostrar',[
        'team'=>Team::paginate()
        ]);
    }
    public function listall()
    {
        $team=Team::select('');
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
    
    public function store()
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
        Team::create($team);
        return redirect()->route('equipo.index')->with('status','El equipo se agrego con exito');

    }
    public function edit(Team $team)
    {
        return view('Equipo.editar',[
            'teamitem'=>$team
        ]);
    }
    public function update(Team $team)
    {
        $team->update(request()->validate(
            [
                'name'=>'required',
                'city'=>'required'
            ],
            [
                '*.required'=>'El campo es requerido',
                
            ]
        ));
        return redirect()->route('equipo.index',$team)->with('status','El equipo se actualizo con exito');
    }
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('equipo.index')->with('status','El equipo se elimino con exito');
    }
}
