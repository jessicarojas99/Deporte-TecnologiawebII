@extends('layout')
@section('title','Atleta')

@section('content')
<div class=" container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
  <div class="bg-white p-5 shadow rounded">
    
    <a class="btn btn-secondary" href="{{route('atleta.index')}}">
      <svg class="bi bi-arrow-left-square-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.354 10.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
    </svg></a>
    <h1 class=" display-4 text-center">Informacion</h1>
    <hr>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Nombre: {{$athlete->name}}</li>
      <li class="list-group-item">Apellido: {{$athlete->lastname}}</li>
      <li class="list-group-item">Carnet: {{$athlete->ci}}</li>
      <li class="list-group-item">Genero: {{$athlete->gender}}</li>
      <li class="list-group-item">Estatura: {{$athlete->height}}</li>
      <li class="list-group-item">Peso: {{$athlete->weight}}</li>
      <li class="list-group-item">Fecha de Nacimiento: {{$athlete->birthdate}}</li>
      @foreach ($equipo as $athlete)
      <li class="list-group-item">Equipo: {{$athlete->name}}</li>
     @endforeach  
     @foreach ($deporte as $athlete)
     <li class="list-group-item">Deporte: {{$athlete->name}}</li>
    @endforeach  
    
    
    </ul>
    <br>
</div>
</div>
@endsection
    