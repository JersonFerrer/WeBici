$(document).ready(function (){
    var $op1 = $('#rutas');
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

function verHorarioRuta(id){
    var $op2 = $('#verHorario .modal-body');
    var mostrarHorario = `  <input type="radio" name = "horario"  >
                            <h4>Fecha: {{fecha}}</h4>
                            <h4>Hora: {{horaSalida}}</h4>
                            `;
    console.log(id);
    $.ajax({
        type: "POST",
        url: '../controller/action/act_verHorarioRuta.php',
        data : {idRuta : id},
        dataType : 'json',
        success : function(response){
            console.log(response);
            //var jsonData = JSON.parse(response);
            if (response.success == "1"){
                $op2.html("");
                for (var i = 0; i < response.horario.length; i++){
                    var NewHorario = mostrarHorario;
                    NewHorario = NewHorario.replaceAll('{{id}}', response.horario[i].id);
                    NewHorario = NewHorario.replace('{{fecha}}', response.horario[i].fecha);
                    NewHorario = NewHorario.replace('{{horaSalida}}', response.horario[i].horaSalida);
                    $op2.append(NewHorario);
                }
            }else{
                Mensaje('error','Oops...',response.message);
            }
        },
        error: function (response) {
            console.log(response);
        }



    })



}