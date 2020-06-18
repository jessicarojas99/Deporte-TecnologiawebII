@extends('layout')
@section('title','Equipo')

@section('content')
<div class="container"> 
    <div class="col-sm-10  mx-auto bg-white shadow rouned">
        <h1 class=" display-4 text-center">Equipos</h1>
        <h4 class="text-center">registrados</h4>
        <hr style="background-color: red">
            <div class="card-body d-flex justify-content-between ">
                @auth
                <a class="btn btn-outline-dark btn-lg float-left" href="{{route('equipo.create')}}">
                    Añadir Equipo
                </a>
                @endauth
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('equipo.search')}}" autocomplete="off">                                     
                    <input class="form-control mr-sm-2" type="search" placeholder="nombre" name="name" aria-label="Search">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" >
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg></button>
                </form>
            </div>      
            <div id="lista">
            </div>     
                
        <div class="list-group-item border-0">
        {{$team->links()}}
        </div>
        @include('Equipo.modalshow')
    </div>
</div>
@endsection
    