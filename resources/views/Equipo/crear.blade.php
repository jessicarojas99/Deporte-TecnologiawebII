<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <form id="formcrear" class="bg-white shadow rounded py-3 px-4 " method="POST" action="{{route('equipo.store')}}" autocomplete="off">
            @csrf
            <h1 class="text-center" >
                Equipo
            </h1>
            <hr>
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input id="name" class="form-control bg-light shadow-sm @error('name')is-invalid @else border-0 @enderror " type="text" name="name" value="{{old('name')}}"  >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  

                    @enderror
            </div>
            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input id="city" class="form-control bg-light shadow-sm @error('city')is-invalid @else border-0 @enderror " type="text" name="city" value="{{old('city')}}"  >
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>
            <div class="container-contact100-form-btn">
                <div class="form-row">
                   <div class="col">
                       <button class="btn btn-outline-dark btn-block btn-lg" id="btnguardar">
                           GUARDAR
                       </button>
                   </div>
                   <div class="col">
                 
                    <button type="button" class="btn btn-danger btn-block btn-lg" data-dismiss="modal">CANCELAR</button>
                      
                   </div>
                </div>
           </div>         
            </form>
        </div>
  </div>
</div>


    