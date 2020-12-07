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
                </div>
            </div>`
    $.ajax({
        url: '../controller/action/act_verRutas.php',
        success: function(response)
        {
            var jsonData = JSON.parse(response);

            // user is successfully register in the back-end
            
            if (jsonData.success == "1"){
                $op1.html("");
                for (var i = 0; i < jsonData.rutas.length; i++) {
                    var NewRuta = templateRuta;

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