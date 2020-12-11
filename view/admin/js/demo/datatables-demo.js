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
});
var obtener_data_editar = function(tbody, table){
  $(tbody).on("click", "button.editar", function(){
    var data = table.row($(this).parents("tr")).data();
    var cedula = $("#cedula").val( data.nroCedula),
        nombre = $("#nombres").val( data.nombres),
        apellido = $("#apellidos").val( data.apellidos),
        correo = $("#correo").val( data.correo),
        direccion = $("#direccion").val( data.direccion),
        telefono = $("#telefono").val( data.telefono),
        rol = $("#rol").val( data.rol);
  })
}
var obtener_cedula_eliminar = function(tbody, table){
  $(tbody).on("click", "button.eliminar", function(){
    var data = table.row($(this).parents("tr")).data();
    var cedula = $("#cedula").val( data.nroCedula);

  })
}