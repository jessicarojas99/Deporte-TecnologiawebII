@extends('layout')
@section('title','Atleta')
@section('content')
<div class="container">
    <div class="col-sm-12 mx-auto bg-white shadow rouned">
        <div class="list-group-item border-0  mx-auto bg-white ">
            <h1 class=" display-4 text-center"><i class="fas fa-running"></i>Atletas</h1>
            <h4 class="text-center">registrados</h4>
            <hr style="color:red;background-color:red">
            <div class="card-body d-flex justify-content-between ">
                @auth     
                <a class="btn btn-outline-dark btn-lg float-left" href="{{route('atleta.create')}}">
                     Añadir Atleta
                </a>
                @endauth
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('atleta.search')}}" autocomplete="off">                                     
                  <select name="tipo" class="custom-select">
                    <option >Elegir</option>
                    <option >name</option>
                    <option >lastname</option>
                    <option >ci</option>
                    <option >gender</option>
                    <option >height</option>
                    <option >weight</option>
                    <option >birthdate</option>
                  </select> 
                  <input class="form-control mr-sm-2" type="search" placeholder="nombre" name="name" aria-label="Search">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" >
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg></button>
                </form>
            </div>  
    
    <table class="table table-striped"> 
        <thead>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CARNET</th>
            <th>GENERO</th>
            <th>ESTATURA</th>
            <th>PESO</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>DEPORTE</th>
            <th>EQUIPO</th>
            <th></th>
        </thead>
        <tbody>
            @forelse ($data as $atleteitem)
            <tr>
                <td>{{$atleteitem->id}}</td>
                <td>{{$atleteitem->name}}</td>
                <td>{{$atleteitem->lastname}}</td>
                <td>{{$atleteitem->ci}}</td>
                <td>{{$atleteitem->gender}}</td>
                <td>{{$atleteitem->height}}</td>
                <td>{{$atleteitem->weight}}</td>
                <td>{{$atleteitem->birthdate}}</td>
                <td>{{$atleteitem->sportname}}</td>
                <td>{{$atleteitem->teamname}}</td>
                <td>
                  <div class="form-row">
                    <div class="col">
                        <a class="btn-outline-dark btn-lg" href="{{route('atleta.show',$atleteitem)}}">
                            <svg class="bi bi-eye" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a>
                    </div>
                    @if(auth()->check())
                        <div class="col">
                            <a class="btn-outline-info btn-lg" href="{{route('atleta.edit',$atleteitem)}}">
                                <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg>
                                </a>
                        </div>
                        @if(auth()->user()->rol == 'admin')
                        <div class="col">     
                            <a type="button" class="btn-outline-danger btn-lg" data-toggle="modal" data-target="#exampleModal">
                                <svg class="bi bi-archive-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                                </svg> 
                              </a>
                        </div>
                    </div>                     
                    @endif
                    @endif
                </td>
                @empty
                <td class=" list-group-item border-0 ">
                    No existen datos para mostrar
                </td>
             @endforelse
            </tr>
            
        </tbody>
    </table>
    
    <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class=" modal-title" id="exampleModalLabel">
                  <svg class="bi bi-exclamation-octagon-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                  Eliminar
                  <svg class="bi bi-exclamation-octagon-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form id="delete" action="{{route('atleta.destroy',$atleteitem)}}" method="POST">
                  @csrf  @method('DELETE')
                  <div class="modal-body ">
                    <h5 class="text-danger">
                      ¿Esta seguro que desea eliminar?
                    </h5>
                  </div>
                  </form>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-dark text-center" onclick="document.getElementById('delete').submit()" data-dismiss="modal">Aceptar</button>       
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
            </div>
          </div>
        </div>
    </div>
    </div>
@endsection