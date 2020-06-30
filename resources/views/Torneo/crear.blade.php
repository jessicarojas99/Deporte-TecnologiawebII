
<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none" id="validate">

            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="torneoCrudModal"></h4>
            </div>
            <div class="modal-body">
                
                <form name="torneoForm" action="" method="POST" id="form">
                @csrf
                <input type="hidden" name="torneo_id" id="torneo_id" >
        <div class="form-group">
            <strong><label for="name">Nombre:</label></strong>
            <input type="name" name="name" id="name" class="form-control bg-light shadow-sm">
        </div>
        <div class="form-group">
            <strong><label for="startdate">Fecha de Inicio:</label></strong>
            <input type="date" name="startdate" id="startdate" class="form-control bg-light shadow-sm">
        </div>
            <div class="form-group">
                <strong><label for="finishdate">Fecha de Finalizacion:</label></strong>
                <input type="date" name="finishdate" id="finishdate" class="form-control bg-light shadow-sm">
            </div>
    </form>
</div>
<div class="modal-footer">
    <div class="col">
        <button type="submit" id="btn-save" name="btnsave" class="btn btn-dark  btn-block">Guardar</button>
        
    </div>
    <div class="col">
        
        <a href="" class="btn btn-danger btn-block" data-dismiss="modal" id="cancelar">Cancelar</a>
            </div>
        </div>
  </div>
</div>
