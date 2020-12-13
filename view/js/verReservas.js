var table = null;
$(document).ready(function() {
  table = mostrarTabla();
  cancelarReserva("#dataTable tbody", table);
});

function mostrarTabla(){
    return $('#dataTable').DataTable({
      ajax: "../controller/action/act_verReserva.php",
      columns: [
              { data: "id" },
              { data: "fecha" },
              { data: "horasContratadas" },
              { data: "horaEntrega" },
              { data: "horaDevolucion" },
              { data: "estado" },
              {"defaultContent": "<button type='button' class='eliminar btn btn-danger' data-toggle='modal'  >Cancelar</button>"}
      ]
    });
    
}
var cancelarReserva = function(tbody, table){
    $(tbody).on("click","button.eliminar", function(evt){
      evt.preventDefault();
      var data1 = table.row($(this).parents("tr")).data();
      console.log(data1);
      $.ajax({
            type : "POST",
            url : '../controller/action/act_cancelarReserva.php',
            data: { idReserva : data1.id },
            dataType : 'json',
            success : function(response){
              if(response.success == "1"){
                Mensaje('success', 'Su reserva fue cancelada', response.message); 
              }else {
                Mensaje('error', 'Su reserva no pudo ser cancelada', response.message);
              }
            },
              error: function (response) {
               console.log(response);
           }
          })
    })
  }