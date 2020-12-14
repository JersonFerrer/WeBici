var table = null;
$(document).ready(function (){
    var $op1 = $('#rutas');
    var templateRuta =`<div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img">{{iframeMapa}}</div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>{{nombre}}</h2>
                    <h3></h3>
                    <p>Tiempo: {{tiempoEstimado}}</p>
                    <p class="lead mb-0">{{descripcion}}</p>
                    <button type="button"  class="btn btn-block btn-md btn-primary verHorario" id="{{id}}" href = "#verHorario" data-toggle = "modal" >Ver horarios</button>
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
                $('.verHorario').on('click', function(evt){
                    evt.preventDefault();
                    verHorarioRuta($(this).attr('id'));
                    $('#dataTable tbody').one('click', "button.inscribirse", function(evt){
                        evt.preventDefault();
                        var data1 = table.row($(this).parents("tr")).data();
                        console.log(data1.id);
                        $.ajax({
                            type : "POST",
                            url : '../controller/action/act_inscribirseRutas.php',
                            data : { idHorario : data1.id},
                            dataType: "json",
                            success : function(response){
                                console.log(response);
                                if(response.success == '1'){
                                    Mensaje('success', 'Su inscripcion fue exitosa', response.message);
                                    $('#verHorario').modal('hide');
                                }else{
                                    Mensaje('success', 'Su inscripcion no fue exitosa', response.message);
                                    $('#verHorario').modal('hide');
                                }
                                
                            },
                                error: function (response) {
                                console.log(response);
                            }
                        })
                    })
                })

            }else{
                Mensaje('error','Oops...',jsonData.message);
            }
       }
    });

    
})

function verHorarioRuta(id){
    console.log(id);
    table = $('#dataTable').DataTable({
        destroy: "true",
        ajax: "../controller/action/act_verHorarioRuta.php?idRuta="+id,
        columns: [
                { data: "id" },
                { data: "fecha" },
                { data: "horaSalida" },
                {"defaultContent": "<button type='button' class='btn btn-success inscribirse'> Inscibirse </button>"}
        ]
    });
    
    //return table;
}

/*function registarHorario(){
    $('#dataTable tbody').on('click', "button.inscribirse", function(evt){
        evt.preventDefault();
        var data1 = table.row($(this).parents("tr")).data();
        console.log(data1.id);
        $.ajax({
            type : "POST",
            url : '../controller/action/act_inscribirseRutas.php',
            data : { idHorario : data1.id},
            dataType: "json",
            success : function(response){
                console.log(response);
                if(response.success == '1'){
                    Mensaje('success', 'Su inscripcion fue exitosa', response.message);
                    $('#verHorario').modal('hide');
                }else{
                    Mensaje('success', 'Su inscripcion no fue exitosa', response.message);
                    $('#verHorario').modal('hide');
                }
                
            },
                error: function (response) {
                console.log(response);
            }
        })
    })
}*/