<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <form class="bg-white shadow rounded py-3 px-4 " id="formeditar" autocomplete="off" method="POST">
            @csrf 
            <h1 class="text-center">
                Equipo editar
            </h1>
            <hr>
            <div class="form-group">
                {{-- <input id="id1" class="form-control bg-light shadow-sm" type="text" name="name" visible="false" value="{{old('id')}}"  > --}}
                <label for="name">Nombre:</label>
                <input id="name1" class="form-control bg-light shadow-sm @error('name')is-invalid @else border-0 @enderror " type="text" name="name" value="{{old('name')}}"  >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>
            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input id="city1" class="form-control bg-light shadow-sm @error('city')is-invalid @else border-0 @enderror " type="text" name="city" value="{{old('city')}}"  >
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>
            <div class="container-contact100-form-btn">
                <div class="form-row">
                   <div class="col">
                       <button id="btnactualizar" class="btn btn-outline-dark btn-block btn-lg">
                           ACTUALIZAR
                       </button>
                   </div>
                   <div class="col">
                       <a class=" btn btn-danger btn-block btn-lg" href="{{route('equipo.index')}}">CANCELAR</a>
                   </div>
                </div>
           </div>
            </form>
        </div>
  </div>
</div>

    