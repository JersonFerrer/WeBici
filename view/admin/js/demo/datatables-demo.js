// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    ajax: "../../controller/action/act_verUsuarios.php",
    columns: [
            { data: "idUsuario" },
            { data: "nroCedula" },
            { data: "nombres" },
            { data: "apellidos" },
            { data: "correo" },
            { data: "direccion" },
            { data: "telefono" },
            { data: "rol" }
    ]
  });
});
