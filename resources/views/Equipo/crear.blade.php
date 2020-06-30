<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class=" text-center">Añadir Equipo</h1> 
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">               
                <form id="crear" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="fas fa-file-signature"></i>Nombre</label>
                        <input type="text" name="name" id="name" class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="city"><i class="fas fa-city"></i>Ciudad</label>
                        <input type="text" name="city" id="city" class="form-control ">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col">
                    <button type="button" id="enviar" class="btn btn-secondary btn-block" >Guardar</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>