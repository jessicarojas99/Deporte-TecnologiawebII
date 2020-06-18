<h1 class="text-center">
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
    <button class="btn btn-outline-primary btn-block btn-lg">
        <span>
            GUARDAR
        </span>
    </button>
</div>


