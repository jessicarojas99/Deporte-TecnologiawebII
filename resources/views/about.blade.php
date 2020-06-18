@extends('layout')
@section('title','About')

@section('content')
<div class=" container">
    <div class="row">
        <div class="col-12 col-lg-6">
        <h1 class=" display-4 text-danger">Deportes</h1>
        <p>En esta pagina encontraras los deportes que hay en el pais y los diferentes atletas que lo practican</p>
        <a class="btn btn-lg btn-danger "href="{{route('contacto')}}">Contactame</a>
        </div>
    <div class="col-12 col-lg-6">
        <img class=" img-fluid mb-4" src="/images/atleta.svg" alt="atleta">
    </div>
    </div>
</div>
@endsection