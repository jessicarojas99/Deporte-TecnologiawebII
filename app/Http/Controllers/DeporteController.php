<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Sport;
use App\Team;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class DeporteController extends Controller
{
    public function __construct()
    {
        //si no esta autenticado solo me muestre las vistas show/index
        $this->middleware('auth')->except('show','index','search','about');
        $this->middleware('admin')->only('destroy');
    }
    
    public function index()
    {
        
        return view('Deporte.DeporteTabla',[
        'sport'=>Sport::paginate()
        ]);
    }
    
    public function show(Sport $sport)
    {
        //sport variable para view
        return view('Deporte.Deporteshow',[
            'sport'=>$sport
        ]);
    }
    public function about()
    {
        return view('about',[
            'sport'=>Sport::all()
            ]);
    }
    public function create()
    {
        return view('Deporte.Deporte',
        [
           
            'sport' => new Sport
        ]);
    }

    public function search(Request $request)
    {
       $name=$request->get('name');
       $modality=$request->get('modality');
       $sport=Sport::name($name)->modality($modality)->paginate(5);
        return view('Deporte.DeporteTabla',compact('sport'));
    }
    public function store(ProjectRequest $request)
    {
        //ingresar los datos validados en projectrequest
        Sport::create($request->validated());
        return redirect()->route('deporte.index')->with('status','El deporte se agrego con exito');
        //Sport::create(request()->all();

    }
    public function edit(Sport $sport)
    {
        return view('Deporte.DeporteEditar',[
            'sport'=>$sport
        ]);
    }
    public function update(ProjectRequest $request, Sport $sport)
    {
        $sport->update($request->validated());
        return redirect()->route('deporte.show',$sport)->with('status','El deporte se actualizo con exito');
    }
    public function destroy(Sport $sport)
    {
        $sport->delete();
        return redirect()->route('deporte.index')->with('status','El deporte se elimino con exito');
    }
}
