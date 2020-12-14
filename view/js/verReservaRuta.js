var table = null;
$(document).ready(function() {
  table = mostrarTabla();

  $('#dataTable tbody').on("click","button.eliminar", function(evt){
    evt.preventDefault();
    var data1 = table.row($(this).parents("tr")).data();
    console.log(data1.id);
    $.ajax({
          type : "POST",
          url : '../controller/action/act_verInscripcionesRutas.php',
          dataType : 'json',
          success : function(response){
            if(response.success == "1"){
              Mensaje('success', 'Su reserva fue cancelada', response.message);
              table = mostrarTabla();
            }else {
              Mensaje('error', 'Su reserva no pudo ser cancelada', response.message);
            }
          },
            error: function (response) {
             console.log(response);
         }
        })
  })
});

function mostrarTabla(){
    return $('#dataTable').DataTable({
      destroy: "true",
      ajax: "../controller/action/act_verInscripcionesRutas.php",
      columns: [
              { data: "id","visible" : false},
              { data: "fecha" },
              { data: "origen" },
              { data: "destino" },
              { data: "tiempoEstimado" },
              { data: "horaSalida" },
              { data: "estado" },
              {"defaultContent": "<button type='button' class='eliminar btn btn-danger' data-toggle='modal'  >Cancelar</button>"}
      ]
    });
    
}