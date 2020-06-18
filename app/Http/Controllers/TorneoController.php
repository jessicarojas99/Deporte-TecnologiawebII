<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show','index','search');
        $this->middleware('admin')->only('destroy');
    }
    public function index()
    {
        return view('Torneo.mostrar',[
            'torneo'=>Tournament::paginate()
        ]);
    }
   
    public function create()
    {
        return view('Torneo.crear',
        [
            'torneo' => new Tournament()
        ]);
    }
    public function store()
    {
       $torneo=request()->validate(
            [
                'name'=>'required',
                'startdate'=>'required|date',
                'finishdate'=>'required|date',
            ],
            [
                '*.required'=>'El campo es requerido',
            ]

        );
        Tournament::create($torneo);
        return redirect()->route('torneo.index')->with('status','El torneo se agrego con exito');

    }
    public function edit(Tournament $torneo)
    {
        return view('Torneo.editar',[
            'torneoitem'=>$torneo
        ]);
    }
    public function search(Request $request)
    {
        return view('Torneo.mostrar',[
            'torneo'=>Tournament::name($request->get('name'))->paginate()
            ]);
    }
    public function update(Tournament $torneo)
    {
        
        $torneo->update(request()->validate(
            [
                'name'=>'required',
                'startdate'=>'required|date',
                'finishdate'=>'required|date',
            ],
            [
                '*.required'=>'El campo es requerido',
            ]

        ));

        return redirect()->route('torneo.index',$torneo)->with('status','El torneo se actualizo con exito');
    }

    public function destroy(Tournament $torneo)
    {
        $torneo->delete();
        return redirect()->route('torneo.index')->with('status','El torneo se elimino con exito');
    }

}
