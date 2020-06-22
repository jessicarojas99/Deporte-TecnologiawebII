@extends('layout')
@section('title','Equipo')

@section('content')
<div class="container"> 
    <div class="col-sm-10  mx-auto bg-white shadow rouned">
        <h1 class=" display-4 text-center">Equipos</h1>
        <h4 class="text-center">registrados</h4>
        <hr style="background-color: red">
            <div class="card-body d-flex justify-content-between ">
                @auth
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Añadir Equipo</button>
                @endauth
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('equipo.search')}}" autocomplete="off">                                     
                    <input class="form-control mr-sm-2" type="search" placeholder="nombre" name="name" aria-label="Search">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" >
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg></button>
                </form>
            </div>    
           <div id="list-Equipo"></div>   
    </div>
</div>
@include('Equipo.crear')
@include('Equipo.editar')
<script>
    $(document).ready(function(){
        listEquipo();
        Mostrar();
    });
 
    $(document).on("click",".pagination a",function(e){
        e.preventDefault();
        var url=$(this).attr("href");
        $.ajax({
            type:'get',
            url:url,
            success:function(data)
            {
                $('#list-Equipo').empty().html(data);
            }

        })
    });

    var listEquipo = function(){
        $.ajax({
            type:'get',
            url:"{{ url('listEquipo') }}",
            success: function(data){
                $('#list-Equipo').empty().html(data);
            }
        });
    }
    $("#btnguardar").click(function(){
            
        let form=$("#formcrear");
        
        let formdata=$(form[0]).serialize();
        $.ajax({
            url:"{{route('equipo.store')}}",
          
            type:'POST',
            dataType:'json',
            data: formdata,
            cache:false,
            success:function(data){
                
                table.ajax.reload();
                $('#formcrear').modal('hide');
            },
            error:function(data){
               console.log(error);
            }
        });
    });
    $("#btneditar").click(function(){
        let a='dd';
        let formdata=$(this).attr('id');
        alert(a);
    });

    var Mostrar = function(id)
    {
        var route ="{{url('equipo')}}/"+id+"/editar";
        $.get(route,function(data){
           
            $('#id1').val(data.id);
            $('#name1').val(data.name);
            $('#city1').val(data.city);

        });
    }
    $("#btnactualizar").click(function(){
        var id=$('#id1').val();
        let form=$("#formeditar");
        
        let formdata=$(form[0]).serialize();
        var route ="{{url('equipo')}}/"+id+"";
        $.ajax({
            url:route,
            type:'POST',
            dataType:'json',
            data:formdata,
            success: function(data){
                if(data.success=='true')
                {
                    listEquipo();
                }
            },
            error:function(data){
                console.log(error);
             }
        });
    });

    var Eliminar=function(id)
    {
        var route ="{{url('equipo')}}/"+id+"";
        $.ajax({
            url:route,
            type:'DELETE',
            dataType:'json',
            data:{
                name:name,
                city:city},
            success: function(data){
                if(data.success=='true')
                {
                    listEquipo();
                }
            },
            error:function(data){
                console.log(error);
             }
        });
    }
</script>
@endsection
