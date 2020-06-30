<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalCenterTitle">Eliminar</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                @csrf
                <input type="hidden" id="id" name="id" value="">
                <div class="modal-body" style="color: red">
                    <h5>¿Estas seguro que desea eliminar?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete" class="btn btn-secondary">Aceptar</button>
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>