@extends('layout')
@section('title','contacto')

@section('content')

<div class="container">  
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4 " method="POST" action="{{route('contacto')}}" autocomplete="off">
            @csrf
            <h1 class="text-center">
                <i class="fas fa-envelope-open-text"></i> Contacto
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
                <label for="email">Email:</label>
                <input id="email" class="form-control bg-light shadow-sm @error('email')is-invalid @else border-0 @enderror " type="text" name="email" value="{{old('email')}}"  >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>
            <div class="form-group">
                <label for="subject">Asunto:</label>
                <input id="subject" class="form-control bg-light shadow-sm @error('subject')is-invalid @else border-0 @enderror " type="text" name="subject" value="{{old('subject')}}"  >
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
            </div>
            <div class="form-group">
                <label for="content">Mensaje:</label>
                <textarea id="content" class="form-control bg-light shadow-sm @error('content')is-invalid @else border-0 @enderror "name="content"  >{{old('content')}}</textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>  
                    @enderror
              
            </div>
            <div class="container-contact100-form-btn">
                <button class="btn btn-outline-primary btn-block btn-lg">
                    <span>
                        Enviar
                    </span>
                </button>
            </div>           
            </form>
        </div>
  </div>
</div>
@endsection
    