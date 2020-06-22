
<table class="table table-striped"> 
    <thead class=" table-dark">
        <th>ID</th>
        <th>Nombre</th>
        <th>Ciudad</th>
        <th></th>
    </thead>
    <tbody>

        @forelse ($team as $teamitem)
        <tr>
            <td> {{$teamitem->id}}</td>
            <td> {{$teamitem->name}}</td>
            <td> {{$teamitem->city}}</td>
            <td>
                @if(auth()->check())
                <div class="form-row">
                        <div class="col">
                          <a type="button" onclick='Mostrar({{$teamitem->id}});'  id="btneditar" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-primary" href="{{route('equipo.edit',$teamitem)}}">
                                <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg>
                              </a>
                        </div>
                        @if(auth()->user()->rol == 'admin')
                    <div class="col">     
                        <a id="btneliminar"  onclick='Eliminar({{$teamitem->id}});' class=" btn-outline-danger btn-lg" data-toggle="modal" data-target="#exampleModal">
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
<div class="list-group-item border-0" id="paginate">
{{$team->links()}}
</div>

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
          <form id="delete" action="{{route('equipo.destroy',$teamitem)}}" method="POST">
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
 