@extends('layout')
@section('title','Deporte')

@section('content')
<div class="container" >  
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4 " method="POST" action="{{route('deporte.store')}}" autocomplete="off">
                @csrf
                @include('Deporte.form',['btn'=>'GUARDAR'])                
            </form>
        </div>
  </div>
</div>
@endsection
    