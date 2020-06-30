@extends('layout')
@section('title','About')

@section('content')
<div class=" container">
    <h1 class=" display-4 text-center">DEPORTES</h1>
    
    <div class="row">
      
        <div class="col-12 col-lg-6">
           
            @foreach ($sport as $sportitem)
            <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-danger">{{$sportitem->name}}</div>
                <div class="card-body text-dark">
                  <h5 class="card-title">{{$sportitem->modality}}</h5>
                  <p class="card-text"></p>
                </div>
                <div class="card-footer bg-transparent border-danger">{{$sportitem->description}}</div>
              </div>
                    @endforeach
        </div>
    <div class="col-12 col-lg-6">
        <img class=" img-fluid mb-4" src="/images/dep.jpg" alt="atleta">
   
        <img class=" img-fluid mb-4" src="/images/deporte.jpg" alt="atleta">
   
        <img class=" img-fluid mb-4" src="/images/deportes.jpg" alt="atleta">
    </div>
    </div>

 
 
@endsection