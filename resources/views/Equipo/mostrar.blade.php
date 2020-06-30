@extends('layout')
@section('title','Equipo')

@section('content')
<div class="container"> 
    <div class="col-sm-10  mx-auto bg-white shadow rouned">
        <h1 class=" display-4 text-center"><i class="fas fa-football-ball"></i>Equipos</h1>
        <h4 class="text-center">registrados</h4>
        <hr style="background-color: red">
        <div class="container">
            <div id="msg-agregar" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                <strong>Se agrego correctamente</strong>
            </div>
            <div id="msg-actualizar" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                <strong>Se actualizaron los datos</strong>
            </div>
            
            <div id="msg-eliminar" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
                <strong>Se elimino correctamente</strong>
            </div>
        </div>
        <div class="card-body d-flex justify-content-between ">
            @auth
                <a href="#" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#CreateModal">Añadir Equipo</a>
            @endauth
            <form class="form-inline my-2 my-lg-0" autocomplete="off">                                     
                <input class="form-control mr-sm-2" placeholder="nombre" name="name" id="name" type="text" aria-label="Search">
                <input class="form-control mr-sm-2" placeholder="city" name="city" id="city" type="text" aria-label="Search">
            
            </form>
        </div>    
           <div id="list-Equipo"></div>   
           <div id="search1"></div>
    </div>
</div>
@include('Equipo.crear')
@include('Equipo.editar')
@include('Equipo.eliminar')
@include('Equipo.ver')
<script>

    {{-- Mostar   --}}
    $(document).ready(function(){
        listEquipo();
    });
    $(document).on('keyup', '#name,#city', function(){
           
        var name = $('#name').val().toLowerCase();
        var city = $('#city').val();
        $.ajax({
            url:"{{route('equipo.search')}}",
            type:'GET',
            data: {name:name,city:city},
            success: function(data)
            {
                
                console.log(data);
                //listEquipo();
               
                $('tbody').empty().html(data);
                
                
            },
            error:function(){
                alert('error');               
            },
        })
    })
 
    var listEquipo = function(){
        $.ajax({
            type:'get',
            url:"{{ url('listEquipo') }}",
            success: function(data){
                $('#list-Equipo').empty().html(data);
            }
        });
    }
    {{--  Paginacion  --}}
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

  
    {{--  EDITAR  --}}
    var Mostrar = function(team)
    {
        var route ="{{url('equipo')}}/"+team+"/edit";
        $.get(route, function(data){
           
            $('#id1').val(data.id);
            $('#name1').val(data.name);
            $('#city1').val(data.city);

        });
    }
    var Ver = function(team)
    {
        var route ="{{url('equipo')}}/"+team+"/edit";
        $.get(route, function(data){
           
            $('#sname').html(data.name);
            $('#scity').html(data.city);
        });
    }
    {{--  ACTUALIZAR  --}}
    $("#actualizar").click(function () {
        var id = $("#id1").val();
        var name = $("#name1").val();
        var city = $("#city1").val();
        var route = "{{ url('equipo') }}/" + id + "";
        var token = $("input[name=_token]").val();
        $.ajax({
            url: route,
            headers: { 
                'X-CSRF-TOKEN': token
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                name: name,
                city: city,
            },
            success: function (data) {
                if (data.success == "true") {
                    listEquipo();
                    $('#EditModal .close').click();
                    $('#msg-actualizar').fadeIn();
                    $('#msg-actualizar').show().delay(1000).fadeOut(1);
                }
            },
            error: function (data) {
                alert('campos vacios');
            }
        });
    });

    {{--  Crear  --}}
    $('#enviar').click(function () {
        
        let form=$('#crear');
        let formdata=$(form[0]).serialize();
        var route = "{{ route('equipo.store') }}";
        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'json',
            data: formdata,
            cache:false,
            success: function (data) {
                if (data.success == "true") {
                    listEquipo();
                   
                    $('#CreateModal .close').click();
                    $('#msg-agregar').fadeIn();
                    $('#msg-agregar').show().delay(1000).fadeOut(1);
                }
            }
        });
    });
   
   
 {{--  Eliminar  --}}
 var Eliminar = function (team) {
    var route = "{{ url('equipo') }}/" + team + "/edit";
    $.get(route, function (data) {
        $("#id").val(data.id);
       
    });
}
$('#delete').click(function () {
    var id = $("#id").val();
    var token = $("input[name=_token]").val();
    var route = "{{ URL('equipo') }}/" + id;
    
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'DELETE',
        success: function (data) {
            if (data.success == "true") {
                listEquipo();
                $('#exampleModalCenter .close').click();
                $('#msg-eliminar').fadeIn();
                $('#msg-eliminar').show().delay(1000).fadeOut(1);
            }
        }
    });
});
</script>
@endsection
