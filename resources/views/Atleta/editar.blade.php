@extends('layout')
@section('title','Atleta')

@section('content')

<div class="container">  
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4 " method="POST" action="{{route('atleta.update',$atleteitem)}}" autocomplete="off">
                @csrf @method('PATCH')
            <h1 class="text-center">
                ATLETA
            </h1>
            <hr>
            <div class="form-row">
                <div class="form-group col">
                    <label for="name">Nombre:</label>
                    <input class="form-control bg-light shadow-sm @error('name')is-invalid @else border-0 @enderror " id="name" type="text" name="name"  value="{{old('name',$atleteitem->name)}}" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>  
                        @enderror
                </div>
                <div class="form-group col">
                    <label for="lastname" >Apellido:</label>
                    <input id="lastname" class="form-control bg-light shadow-sm @error('lastname')is-invalid @else border-0 @enderror " type="text" name="lastname"  value="{{old('lastname',$atleteitem->lastname)}}" >
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                        @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="ci">Carnet:</label>
                <input id="ci" class="form-control bg-light shadow-sm @error('ci')is-invalid @else border-0 @enderror " type="text" name="ci" value="{{old('ci',$atleteitem->ci)}}"  >
                    @error('ci')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>
            <div class="form-group">
                <label for="gender">Genero:</label>
                    <select id="gender" class="form-control bg-light shadow-sm @error('gender')is-invalid @else border-0 @enderror"  name="gender">
                        <option selected>{{old('gender',$atleteitem->gender)}}</option>
                        <option value="femenino" {{ old('gender') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value ="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>  
                        @enderror
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="height">Estatura:</label>
                    <input id="height" class="form-control bg-light shadow-sm @error('height')is-invalid @else border-0 @enderror " type="text" name="height" value="{{old('height',$atleteitem->height)}}">
                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                        @enderror
                </div>
                <div class="form-group col">
                    <label for="weight">Peso:</label>
                    <input id="weight" class="form-control bg-light shadow-sm @error('weight')is-invalid @else border-0 @enderror " type="text" name="weight" value="{{old('weight',$atleteitem->weight)}}">
                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                        @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="birthdate">Fecha de Nacimiento:</label>
                <input id="birthdate" class="form-control bg-light shadow-sm @error('birthdate')is-invalid @else border-0 @enderror " type="date" name="birthdate" value="{{old('birthdate',$atleteitem->birthdate)}}" >
                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>  
            <div class="form-group">
                <label for="sport_id">Deporte:</label>
                    <select id="sport_id" class="form-control bg-light shadow-sm @error('sport_id')is-invalid @else border-0 @enderror"  name="sport_id">
                        @foreach ($deporte as $atletaitem)
                            <option value="{{$atletaitem->id}}">{{$atletaitem->name}}</option>
                        @endforeach    
                       
                    </select>
                        @error('sport_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>  
                        @enderror
            </div>
            <div class="form-group">
                <label for="team_id">Equipo:</label>
                    <select id="team_id" class="form-control bg-light shadow-sm @error('sport_id')is-invalid @else border-0 @enderror"  name="team_id">
                        @foreach ($equipo as $atletaitem)
                            <option value="{{$atletaitem->id}}">{{$atletaitem->name}}</option>
                        @endforeach    
                       
                    </select>
                        @error('team_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>  
                        @enderror
            </div>
            <div class="container-contact100-form-btn">
                <div class="form-row">
                   <div class="col">
                       <button class="btn btn-outline-dark btn-block btn-lg">
                           Actualizar
                       </button>
                   </div>
                   <div class="col">
                       <a class=" btn btn-danger btn-block btn-lg" href="{{route('atleta.index')}}">CANCELAR</a>
                   </div>
                </div>
            </div>
            </form>
        </div>
  </div>
</div>
@endsection
    