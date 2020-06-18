@extends('layout')
@section('title','Equipo')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4 " method="POST" action="{{route('equipo.store')}}" autocomplete="off">
            @csrf
            <h1 class="text-center">
                Equipo
            </h1>
            <hr>
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input id="name" class="form-control bg-light shadow-sm @error('name')is-invalid @else border-0 @enderror " type="text" name="name" value="{{old('name')}}"  >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>
            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input id="city" class="form-control bg-light shadow-sm @error('city')is-invalid @else border-0 @enderror " type="text" name="city" value="{{old('city')}}"  >
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>
            <div class="container-contact100-form-btn">
                <div class="form-row">
                   <div class="col">
                       <button class="btn btn-outline-dark btn-block btn-lg">
                           GUARDAR
                       </button>
                   </div>
                   <div class="col">
                       <a class=" btn btn-danger btn-block btn-lg" href="{{route('equipo.index')}}">CANCELAR</a>
                   </div>
                </div>
           </div>         
            </form>
        </div>
  </div>
</div>
@endsection
    