// Call the dataTables jQuery plugin
$(document).ready(function() {
  var table = $('#dataTable').DataTable({
    ajax: "../../controller/action/act_verUsuarios.php",
    columns: [
            { data: "idUsuario" },
            { data: "nroCedula" },
            { data: "nombres" },
            { data: "apellidos" },
            { data: "correo" },
            { data: "direccion" },
            { data: "telefono" },
            { data: "rol" },
            {"defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' href = '#modal'><i class='fas fa-edit'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' href='#modalelim' ><i class='far fa-trash-alt'></i></button>"}
    ]
  });
  obtener_data_editar("#dataTable tbody", table);
  obtener_cedula_eliminar("#dataTable tbody", table);
  editarAdminUser();
  
});
var obtener_data_editar = function(tbody, table){
  $(tbody).on("click", "button.editar", function(){
    var data = table.row($(this).parents("tr")).data();
    var idUsuario = $('#idUsuario').val(data.idUsuario),
        cedula = $("#cedula").val( data.nroCedula),
        nombre = $("#nombres").val( data.nombres),
        apellido = $("#apellidos").val( data.apellidos),
        correo = $("#correo").val( data.correo),
        direccion = $("#direccion").val( data.direccion),
        telefono = $("#telefono").val( data.telefono),
        rol = $("#rol").val( data.rol);
      //editarAdminUser(cedula.val(), nombre.val(), apellido.val(), correo.val(), direccion.val(), telefono.val(), rol.val());
  })
}
var obtener_cedula_eliminar = function(tbody, table){
  $(tbody).on("click", "button.eliminar", function(){
    var data = table.row($(this).parents("tr")).data();
    var cedula = $("#cedula").val( data.nroCedula);

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
            $('#modalconfi').modal('hide');
            $('#modal').modal('hide');
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

