@extends('layout')
@section('title','Torneo')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4 " method="POST" action="{{route('torneo.update',$torneoitem)}}" autocomplete="off">
                @csrf @method('PATCH')
                
        <h1 class="text-center">
            Torneo
        </h1>
        <hr>
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input id="name" class="form-control bg-light shadow-sm @error('name')is-invalid @else border-0 @enderror " type="text" name="name" value="{{old('name',$torneoitem->name)}}"  >
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>  
                @enderror
        </div>
        <div class="form-group">
            <label for="startdate">Fecha de Inicio:</label>
            <input id="startdate" class="form-control bg-light shadow-sm @error('startdate')is-invalid @else border-0 @enderror " type="date" name="startdate" value="{{old('startdate',$torneoitem->startdate)}}" >
                @error('startdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>  
                @enderror
        </div>  
        <div class="form-group">
            <label for="finishdate">Fecha de Finalizacion:</label>
            <input id="finishdate" class="form-control bg-light shadow-sm @error('finishdate')is-invalid @else border-0 @enderror " type="date" name="finishdate" value="{{old('finishdate',$torneoitem->finishdate)}}" >
                @error('finishdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>  
                @enderror
        </div>  
        <div class="container-contact100-form-btn">
            <div class="form-row">
               <div class="col">
                   <button class="btn btn-outline-dark btn-block btn-lg">
                      Guardar
                   </button>
               </div>
               <div class="col">
                   <a class=" btn btn-danger btn-block btn-lg" href="{{route('torneo.index')}}">CANCELAR</a>
               </div>
            </div>
       </div>
                    
            </form>
        </div>
  </div>
</div>
@endsection
    