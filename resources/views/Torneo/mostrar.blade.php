<!DOCTYPE html>
<html>
<head>
<title>Torneo</title>
@include('link')
@include('nav')
</head>
<body>
<div class="container"> 
    <div class="col-sm-10  mx-auto bg-white shadow rouned">
        <h1 class=" display-4 text-center"><i class="fas fa-trophy"></i>Torneos</h1>
        <h4 class="text-center">registrados</h4>
        <hr style="background-color:red">
        <div id="msg-agregar" class="alert alert-success alert-dismissible" role="alert" style="display:none">
          <strong>Se agregaron los datos correctamente</strong>
      </div>
      <div id="msg-eliminar" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
          <strong>Se elimino correctamente</strong>
      </div>
            <div class="card-body d-flex justify-content-between ">
                @auth
                <a class="btn btn-outline-dark mb-2 btn-lg " id="new-torneo" data-toggle="modal" href="#">Agregar Torneo</a>
                @endauth
            </div>           
            <table class="table table-striped data-table" >
              <thead class=" table-dark"> 
                  <tr id="">
                      <th>No</th>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Fecha de Inicio</th>
                      <th>Fecha de Finalizacion</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
  
    </div>
</div>
@include('Torneo.ver')
@include('Torneo.crear')


</body>
<script type="text/javascript">

  $(document).ready(function () {
  var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('torneo.index') }}",
      columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'id', name: 'id'},
      {data: 'name', name: 'name'},
      {data: 'startdate', name: 'startdate'},
      {data: 'finishdate', name: 'finishdate'},
      {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
  
  /*AGREGAR */
  $('#new-torneo').click(function () {
      $('#btn-save').val("create-torneo");
      $('#torneo').trigger("reset");
      $('#torneoCrudModal').html("Agregar Usuario");
      $('#crud-modal').modal('show');
      document.getElementById('passd').style.visibility='visible';
  });
  $('#btn-save').click(function (e) {
      e.preventDefault();
      $.ajax({
          url: "{{ route('torneo.store') }}",
          type: 'POST',
          dataType: 'json',
          data:  $('#form').serialize(),
          cache:false,
          success: function (data) {
              if(data.errors)
              { $('#validate').html('');
                  jQuery.each(data.errors, function(key, value){
                     
                    $('#validate').show();
                      $('#validate').append('<li>'+value+'</li>');
  
                  });
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
  $('body').on('click', '#edit-torneo', function () {
      var torneo_id = $(this).data('id');
      $.get('torneo/'+torneo_id+'/edit', function (data) {

      $('#torneoCrudModal').html("Editar torneo");
      $('#btn-update').val("Update");
      $('#crud-modal').modal('show');
      $('#torneo_id').val(data.id);
      $('#name').val(data.name);
      $('#startdate').val(data.startdate);
      $('#finishdate').val(data.finishdate);
     
          })
      });
  /* Show customer */
  $('body').on('click', '#show-torneo', function () {
    
    var torneo_id = $(this).data('id');
    $.get('torneo/'+torneo_id, function (data) {
    
        $('#sname').html(data.name);
        $('#sstartdate').html(data.startdate);
        $('#sfinishdate').html(data.finishdate);
    })
        $('#torneoCrudModal-show').html("Informacion");
        $('#crud-modal-show').modal('show');
    });
  
  /* Delete customer */
  $('body').on('click', '#delete-torneo', function () {
      var torneo_id = $(this).data("id");
      var token = $("meta[name='csrf-token']").attr("content");
      alert("Estas seguro que quiere eliminar !");
  
  $.ajax({
      type: "DELETE",
      url: "torneo/"+torneo_id,
      data: {
      "id": torneo_id,
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
</html>