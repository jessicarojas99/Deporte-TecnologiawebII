
<h1 class="text-center">
    DEPORTE
 </h1>
 <hr>
 <div class="form-group" >
     <label for="name">Nombre:</label>
     <input id="name" class="form-control bg-light shadow-sm @error('name')is-invalid @else border-0 @enderror " type="text" name="name" value="{{old('name',$sport->name)}}" >
         @error('name')
         <span class="invalid-feedback" role="alert">
             <strong>{{$message}}</strong>
         </span>  
         @enderror
 </div>
 <div class="form-group">
     <label for="modality">Modalidad:</label>
         <select id="modality" class="form-control bg-light shadow-sm @error('modality')is-invalid @else border-0 @enderror" name="modality">
             <option selected>{{old('modality',$sport->modality)}}</option>
             <option value="individual" {{ old('modality',$sport->modality) == 'individual' ? 'selected' : '' }}>Individual</option>
             <option value ="conjunto" {{ old('modality',$sport->modality) == 'individual' ? 'selected' : '' }} >Conjunto</option>
             <option value ="parejas"{{ old('modality',$sport->modality) == 'individual' ? 'selected' : '' }} >Parejas</option>
         </select>
             @error('modality')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>  
             @enderror
         
 </div>
 <div class="form-group">
     <label for="description">Descripcion:</label>
     <textarea id="description" class="form-control bg-light shadow-sm @error('description')is-invalid @else border-0 @enderror " name="description" value="" >{{old('description',$sport->description)}}</textarea>
         @error('description')
         <span class="invalid-feedback" role="alert">
             <strong>{{$message}}</strong>
         </span>  
         @enderror
     
 </div>
 <div class="container-contact100-form-btn">
     <div class="form-row">
        <div class="col">
            <button class="btn btn-outline-dark btn-block btn-lg">
                {{$btn}}
            </button>
        </div>
        <div class="col">
            <a class=" btn btn-danger btn-block btn-lg" href="{{route('deporte.index')}}">CANCELAR</a>
        </div>
     </div>
</div>