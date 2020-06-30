<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none" id="validate">

            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal" style="text-align:center"></h4>
            </div>
            <div class="modal-body">
                <form name="userForm" action="{{ route('users.store') }}" method="POST" id="form" autocomplete="off">
                    
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" >
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Rol:</strong>
                                <select class="custom-select" name="rol" id="rol" class="form-control" placeholder="Rol" >
                                    <option>...</option>
                                    <option value="encargado" id="en">Encargado</option>
                                    <option value="secretaria" id="secre">Secretaria</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" id="passd">
                            <div class="form-group">
                                <strong>Password:</strong>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                            </div>
                        </div>
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <div class="modal-footer">
                                <div class="col">
                                    <button type="submit" id="btn-save" name="btnsave" class="btn btn-dark btn-block "></button>
                                    
                                </div>
                                <div class="col">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger btn-block" data-dismiss="modal" id="cancelar">Cancelar</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>