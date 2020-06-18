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
                @auth
                <div class="form-row">
                        <div class="col">
                            <a class="btn-outline-info btn-lg" href="{{route('equipo.edit',$teamitem)}}">
                                <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg>
                                </a>
                        </div>
                    <div class="col">     
                        <a class=" btn-outline-danger btn-lg" data-toggle="modal" data-target="#exampleModal">
                            <svg class="bi bi-archive-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                            </svg> 
                        </a>
                    </div>
                    
                </div>
                @endauth
            </td>
        @empty
            <td class=" list-group-item border-0 ">
                No existen datos para mostrar
            </td>
         @endforelse
        </tr>
    </tbody>
</table>