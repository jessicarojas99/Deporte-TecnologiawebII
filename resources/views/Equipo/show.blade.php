@extends('layout')
@section('title','Equipo')
@section('content')
<div class=" container">
    <div class="row">
      <div class="col-12 col-sm-10 col-lg-6 mx-auto">
    <div class="bg-white p-5 shadow rounded">
      
      <a class="btn btn-secondary" href="{{route('equipo.index')}}">
        <svg class="bi bi-arrow-left-square-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.354 10.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
      </svg></a>
      <h1 class=" display-4 text-center">Informacion</h1>
      <hr>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Nombre: {{$team->name}}</li>
        <li class="list-group-item">Modalidad: {{$team->city}}</li>      
      </ul>
      <br>
      <div class=" form-row">
        <div class=" form-group col">
          <a class="btn btn-outline-info btn-lg btn-block" href="{{route('equipo.edit',$team)}}">
            <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
              <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
            </svg>
            Editar</a>
        </div>
        <div class="form-group col">
          <button type="button" class="btn btn-outline-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
            <svg class="bi bi-archive-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
            </svg>
            Eliminar
          </button>
        </div>
      </div>
  
  
  <!-- Modal -->
  
            @include('Equipo.modalshow')
    
  </div>
  </div>
@endsection