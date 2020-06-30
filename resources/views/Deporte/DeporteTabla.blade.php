@extends('layout')
@section('title','Deporte')

@section('content')
<div class="container"> 
    <div class="col-sm-10  mx-auto bg-white shadow rouned">
        <h1 class=" display-4 text-center"><i class="fas fa-futbol"></i>Deportes</h1>
        <h4 class="text-center">registrados</h4>
        <hr style="color:red;background-color:red">
            <div class="card-body d-flex justify-content-between ">
                @auth
                <a class="btn btn-outline-dark btn-lg float-left" href="{{route('deporte.create')}}">
                     Añadir Deporte
                </a>
                @endauth
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('deporte.search')}}" autocomplete="off">                                     
                    <input class="form-control mr-sm-2" type="search" placeholder="nombre" name="name" aria-label="Search" value="">
                    <input class="form-control mr-sm-2" type="search" placeholder="modalidad" name="modality" aria-label="Search">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" >
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg></button>
                </form>
            </div>           
                <table class="table table-striped"> 
                    <thead class=" table-dark">
                        <th>Nombre</th>
                        <th>Modalidad</th>
                        <th>Descripcion</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse ($sport as $sportitem)
                        <tr>
                            <td> {{$sportitem->name}}</td>
                            <td> {{$sportitem->modality}}</td>
                            <td> {{$sportitem->description}}</td>
                            <td>
                                <div class="form-row">
                                    <div class="col">
                                        <a class="btn-outline-dark btn-lg" href="{{route('deporte.show',$sportitem)}}">
                                            <svg class="bi bi-eye" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div> 
                            </td>
                        @empty
                            <td class=" list-group-item border-0 ">
                                No existen datos para mostrar
                            </td>
                         @endforelse
                        </tr>
                    </tbody>
                </table>
                {{--  imprimir los links de paginacion  --}}
        <div class="list-group-item border-0">
        {{$sport->links()}}
        </div>
    </div>
</div>
@endsection
    