
<table class="table table-striped"> 
    <thead class=" table-dark">
        <th>ID</th>
        <th>Nombre</th>
        <th>Ciudad</th>
        <th></th>
    </thead>
    <tbody>
        @forelse($team as $teamitem)
        <tr>
            <td> {{$teamitem->id}}</td>
            <td> {{$teamitem->name}}</td>
            <td> {{$teamitem->city}}</td>
            <td>
              
              @if(auth()->check())
                  <a href="#" onclick="Ver({{ $teamitem->id  }})" id="mostrar" class="btn btn-outline-dark" title="Ver" data-toggle="modal" data-target="#MostrarModal">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="#" onclick="Mostrar({{ $teamitem->id  }})" class="btn btn-outline-info" title="Editar" data-toggle="modal" data-target="#EditModal">
                    <i class="far fa-edit"></i>
                  </a>
                @if(auth()->user()->rol == 'admin') 
                  <a href="#" onclick="Eliminar({{ $teamitem->id  }})" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Eliminar">
                    <i class="far fa-trash-alt"></i></a>
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
<div class="list-group-item border-0" id="paginate">
{{$team->links()}}
</div>