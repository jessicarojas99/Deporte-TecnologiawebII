<!DOCTYPE html>
<html>
<head>
<title>Usuarios</title>
@include('link')
@include('nav')

</head>
<body>

    <div class="container"> 
        <div class="col-sm-10  mx-auto bg-white shadow rouned">
            <h1 class=" display-4 text-center"><i class="fas fa-user"></i>Usuarios</h1>
            <h4 class="text-center">registrados</h4>
            <hr style="background-color: red">
            <div id="msg-agregar" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                <strong>Se agregaron los datos correctamente</strong>
            </div>
            <div id="msg-eliminar" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
                <strong>Se elimino correctamente</strong>
            </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-outline-dark mb-2 btn-lg" id="new-user" data-toggle="modal" href="#">Agregar Usuario</a>
                </div>
            </div>
        </div>
        <table class="table table-striped data-table" >
            <thead class=" table-dark"> 
                <tr id="">
                    <th>No</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@include('users.CrearEdit')
@include('users.Ver')
@include('users.eliminar')


</body>

<script type="text/javascript">

$(document).ready(function () {
var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('users.index') }}",
    columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'id', name: 'id'},
    {data: 'name', name: 'name'},
    {data: 'rol', name: 'rol'},
    {data: 'email', name: 'email'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});

/*AGREGAR */
$('#new-user').click(function () {
    $('#btn-save').val("create-user");
    $('#userCrudModal').html("Agregar Usuario");
    $('#btn-save').html("Guardar");
    $('#crud-modal').modal('show');
    document.getElementById('passd').style.visibility='visible';
});
$('#btn-save').click(function (e) {
    e.preventDefault();
    $.ajax({
        url: "{{ route('users.store') }}",
        type: 'POST',
        dataType: 'json',
        data:  $('#form').serialize(),
        cache:false,
        success: function (data) {
            if(data.errors)
            {
                    $('#validate').show();
                    $('#validate').append('<li>'+data.errors+'</li>');
            }
            else
            {
                $('#validate').hide();
                $('#crud-modal').modal('hide');
                $('#msg-agregar').fadeIn();
                $('#msg-agregar').show().delay(2000).fadeOut(1);
                table.ajax.reload();
            }
        },
        error: function (data) {
            
            console.log('Error:', data);
        }
    });
});

/* Editar */
$('body').on('click', '#edit-user', function () {
    var user_id = $(this).data('id');
    $.get('users/'+user_id+'/edit', function (data) {
    $('#userCrudModal').html("Editar Usuario");
    $('#btn-save').html("Actualizar");
    $('#crud-modal').modal('show');
    $('#user_id').val(data.id);
    $('#name').val(data.name);
    $('#rol').val(data.rol);
    $('#email').val(data.email);
    document.getElementById('passd').style.visibility='hidden';
        })
    });

/* Ver */
$('body').on('click', '#show-user', function () {
var user_id = $(this).data('id');
$.get('users/'+user_id, function (data) {

    $('#sname').html(data.name);
    $('#semail').html(data.email);
    $('#srol').html(data.rol);
})
    $('#userCrudModal-show').html("Detalles");
    $('#crud-modal-show').modal('show');
});

/* Eliminar*/
$('body').on('click', '#delete-user', function () {
    
    var user_id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
 
    alert("Estas seguro que quiere eliminar !");

$.ajax({
    type: "DELETE",
    url: "users/"+user_id,
    data: {
    "id": user_id,
    "_token": token,
    },
    success: function (data) {
    table.ajax.reload();
    
    $('#msg-eliminar').fadeIn();
    $('#msg-eliminar').show().delay(2000).fadeOut(1);
  },
    error: function (data) {
    console.log('Error:', data);
   }
  });
 });

});

$('#cancelar').click(function () {
    document.getElementById('form').reset();
});

</script>
@include('footer')
</html>