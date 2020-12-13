$(document).ready(function (){
    var $op1 = $('#rutas');
    var con = 0;
    var templateRuta =`<div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img">{{iframeMapa}}</div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>{{nombre}}</h2>
                    <h3></h3>
                    <p>Tiempo: {{tiempoEstimado}}</p>
                    <p class="lead mb-0">{{descripcion}}</p>
                    <button type="button"  class="btn btn-block btn-md btn-primary" id="{{id}}" href = "#verHorario" data-toggle = "modal" onclick = "verHorarioRuta({{id}})">Ver horarios</button>
                </div>
            </div>`;
    $.ajax({
        type: "POST",
        url: '../controller/action/act_verRutas.php',
        success: function(response)
        {
            var jsonData = JSON.parse(response);

            // user is successfully register in the back-end
            
            if (jsonData.success == "1"){
                $op1.html("");
                for (var i = 0; i < jsonData.rutas.length; i++) {
                    var NewRuta = templateRuta;
                    NewRuta = NewRuta.replaceAll('{{id}}', jsonData.rutas[i].id);
                    NewRuta = NewRuta.replace('{{nombre}}', jsonData.rutas[i].nombre);
                    NewRuta = NewRuta.replace('{{tiempoEstimado}}', jsonData.rutas[i].tiempoEstimado);
                    NewRuta = NewRuta.replace('{{descripcion}}', jsonData.rutas[i].descripcion);
                    NewRuta = NewRuta.replace('{{iframeMapa}}', jsonData.rutas[i].iframeMapa);
                    if(i % 2 != 0){
                        NewRuta = NewRuta.replace('order-lg-2'," ");
                    }
                    $op1.append(NewRuta);
                    
                }
            }else{
                Mensaje('error','Oops...',jsonData.message);
            }
       }
    });


})

/*function verHorarioRuta(id){
    $.ajax({
        type: "POST",
        url : '../controller/action/act_verHorarioRuta.php',
        dataType: "json",
        data : {idRuta: id},

        success : function(response){
            $('#dataTable').DataTable({
                data : response,
                columns: [
                    { data: "response.id" },
                    { data: "response.fecha" },
                    { data: "response.horaSalida" },
                    {"defaultContent": "<button type='button' class='eliminar btn btn-success' data-toggle='modal' >Inscribirse</button>"}
              ]
            })
        }
    })
    $('#dataTable').DataTable({
            'ajax' : {​​​​​
                url: "../controller/action/act_verHorarioRuta.php",
                type: "POST",
                data:{​​​​​ idRuta : id }​​​​​
            }​​​​​,
            'columns': [
                { data: "id" },
                { data: "fecha" },
                { data: "horaSalida" },
                {"defaultContent": "<button type='button' class='eliminar btn btn-success' data-toggle='modal' >Inscribirse</button>"}
            ]
    })
}*/

function verHorarioRuta(id){
    console.log(id);
    /*return $('#dataTable').DataTable({
        ajax: "../controller/action/act_verHorarioRuta.php",
        type: "POST",
        data:{​​​​​ idRuta : id }​​​​​,
        columns: [
            { data1: "id" },
            { data1: "fecha" },
            { data1: "horaSalida" },
            {"defaultContent": "<button type='button' class='eliminar btn btn-success' data-toggle='modal' >Inscribirse</button>"}
        ]
      });*/
      $.ajax({
        type: "POST",
        url : '../controller/action/act_verHorarioRuta.php',
        dataType: "json",
        data : {idRuta: id},

        success : function(response){

            console.log(response.data1[0]);

            $('#dataTable').DataTable({
                data : response,
                columns: [
                    { data1: "response.id" },
                    { data1: "response.fecha" },
                    { data1: "response.horaSalida" },
                    {"defaultContent": "<button type='button' class='eliminar btn btn-success' data-toggle='modal' >Inscribirse</button>"}
              ]
            })
        }
    })
}
