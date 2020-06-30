<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Editar Equipo</h1>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" id="editar">
                    @csrf
                    <input type="hidden" id="id1" name="id1">
                    
                    <div class="form-group">
                      
                        <label for="name1">Nombre</label>
                        <input type="text" name="name1" id="name1" class="form-control" value="{{ old('name') }}"> 
                    </div>
                    <div class="form-group">
                        <label for="city1">Ciudad</label>
                        <input type="text" name="city1" id="city1" class="form-control" value="{{ old('city') }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col">
                    <button type="button" id="actualizar" class="btn btn-dark btn-block" >Actualizar</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                </div>
                
               
            </div>
        </div>
    </div>
</div>