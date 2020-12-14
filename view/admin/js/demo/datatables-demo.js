// Call the dataTables jQuery plugin
var table = null;
$(document).ready(function() {
  table = mostrarTabla();

  $("#dataTable tbody").on("click", "button.editar", function(){
    var data = table.row($(this).parents("tr")).data();
    console.log(data);
    var idUsuario = $('#idUsuario').val(data.idUsuario),
        cedula = $("#cedula").val( data.nroCedula),
        nombre = $("#nombres").val( data.nombres),
        apellido = $("#apellidos").val( data.apellidos),
        correo = $("#correo").val( data.correo),
        direccion = $("#direccion").val( data.direccion),
        telefono = $("#telefono").val( data.telefono),
        rol = $("#rol").val( data.rol);
  });

  
  obtener_id_eliminar("#dataTable tbody", table);
  editarAdminUser();
});

function mostrarTabla(){
  return $('#dataTable').DataTable({
    destroy: "true",
    ajax: "../../controller/action/act_verUsuarios.php",
    columns: [
            { data: "idUsuario", "visible" : false },
            { data: "nroCedula" },
            { data: "nombres" },
            { data: "apellidos" },
            { data: "correo" },
            { data: "direccion" },
            { data: "telefono" },
            { data: "rol" },
            {"defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' href = '#modal'><i class='fas fa-edit'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal'  ><i class='far fa-trash-alt'></i></button>"}
    ]
  });
  
}

var obtener_id_eliminar = function(tbody, table){
  $(tbody).on("click","button.eliminar", function(evt){
    evt.preventDefault();
    var data1 = table.row($(this).parents("tr")).data();
    console.log(data1.idUsuario);
    $.ajax({
          type : "POST",
          url : '../../controller/action/act_eliminaAdmAUser.php',
          data: {idUsuario: data1.idUsuario},
          dataType : 'json',
          success : function(response){
            console.log(response);
            if(response.success == 1){
              Mensaje('success', 'Usuario eliminado', response.message);
              table=mostrarTabla();
              
            }else {
              Mensaje('error', 'Oops...', response.message);
            }
          },
            error: function (response) {
             console.log(response);
         }
        })
  })
}

function editarAdminUser(){
    
    $('#guardar').on('click', function(evt){
      evt.preventDefault();
      var id = $('#idUsuario').val();
          cedula = $('#cedula').val(),
          nombre = $('#nombres').val(),
          apellido = $('#apellidos').val(),
          correo = $('#correo').val(),
          direccion = $('#direccion').val(),
          telefono = $('#telefono').val(),
          rol = $('#rol').val();
      $.ajax({
        type : "POST",
        url : '../../controller/action/act_admPorUser.php',
        data: {idUsuario: id , nroCedula : cedula, names: nombre, last_names : apellido, email : correo, address : direccion, cellphone : telefono, aux : 1, rol : rol},
        dataType : 'json',
        success : function(response){
          if(response.success == "1"){
            Mensaje('success', 'Usuario modificado', response.message);
            table = mostrarTabla();
            //obtener_data_editar("#dataTable tbody", table);
            $('#modalconfi').modal('hide');
            $('#modal').modal('hide');
          }else {
            Mensaje('error', 'No puede quedar espacion en blanco', response.message);
          }
        },
          error: function (response) {
           console.log(response);
       }
      })
    })
}

