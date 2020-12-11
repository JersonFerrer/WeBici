$(document).ready(function () {

    var $op1 = $('.container .row .col-lg-9 #ruta');
    var $op2 = $('.container .row .col-lg-9 #hibrida');
    var $op3 = $('.container .row .col-lg-9 #urbanas');
    var $op4 = $('.container .row .col-lg-9 #plegables');
    var DivModals =  $('#modals');
    var templateBici = `<div class="col-lg-4 col-sm-6 mb-4">
        <div class="catalogue-item">
            <a class="catalogue-link" data-toggle="modal" href="#{{id}}">
                <div class="catalogue-hover">
                    <div class="catalogue-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                </div>
                <img class="img-fluid" src="/img/bicis/{{imagen}}" alt="" />
            </a>
            <div class="catalogue-caption">
                <div class="catalogue-caption-heading">{{modelo}}</div>
                <div class="catalogue-caption-subheading text-muted">$ {{precio}}/h</div>
            </div>
        </div>
    </div>`;
    var templateModal = `<div class="catalogue-modal modal fade" id="{{id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" />
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here-->
                                                <h2 class="text-uppercase">{{modelo}}</h2>

                                                <img class="img-fluid d-block mx-auto" src="/img/bicis/{{imagen}}" alt="" />
                                                
                                                <ul class="list-inline">
                                                    <li>Marca: {{marca}}</li>
                                                    <li>Talla: {{talla}}</li>
                                                    <li>Peso: {{peso}}</li>
                                                    <li>Tamaño Rueda: {{tamRueda}}</li>
                                                    <li>ID: {{ID}}</li>
                                                </ul>
                                                <p>{{descripcion}}</p>
                                                <button class="btn btn-primary" data-dismiss="modal" type="button" data-toggle="modal" href="#forReserva" onclick = "ReservarBici({{ID}})">
                                                    <i class="fas fa-check mr-1"></i>
                                                    Alquilar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

    $('.container .row .col-lg-3 .list-group #op1').on('click', function (evt) {
        evt.preventDefault();
        $op1.html("");
        $.ajax({
            type: "POST",
            url: '../controller/action/act_verBicicletasPorTipo.php',
            data: { tipo: 1 },
            dataType: "json",
            success: function (response) {

                if (response.success == "1") {
                    for (var i = 0; i < response.bicis.length; i++) {
                        var NewBici = templateBici;
                        var NewModal = templateModal;

                        NewBici = NewBici.replace('{{id}}', 'ruta' + response.bicis[i].id);
                        NewBici = NewBici.replace('{{modelo}}', response.bicis[i].modelo);
                        NewBici = NewBici.replace('{{precio}}', response.bicis[i].precio);
                        NewBici = NewBici.replace('{{imagen}}', response.bicis[i].imagenes[0].imagen);
                        $op1.append(NewBici);

                        NewModal = NewModal.replace('{{id}}', 'ruta' + response.bicis[i].id);
                        NewModal = NewModal.replaceAll('{{ID}}', response.bicis[i].id);
                        NewModal = NewModal.replace('{{modelo}}', response.bicis[i].modelo);
                        NewModal = NewModal.replace('{{marca}}', response.bicis[i].marca);
                        NewModal = NewModal.replace('{{talla}}', response.bicis[i].talla);
                        NewModal = NewModal.replace('{{peso}}', response.bicis[i].peso);
                        NewModal = NewModal.replace('{{tamRueda}}', response.bicis[i].tamRueda);
                        NewModal = NewModal.replace('{{descripcion}}', response.bicis[i].descripcion);
                        NewModal = NewModal.replace('{{imagen}}', response.bicis[i].imagenes[0].imagen);
                        DivModals.append(NewModal);
                    }
                }
                else {
                    Mensaje('error', 'Oops...', jsonData.message);
                }
            }
        });

        $op1.css({
            'display': 'block',
            'display': 'flex',
        });
        $op2.css('display', 'none');
        $op3.css('display', 'none');
        $op4.css('display', 'none');
    });
    $('.container .row .col-lg-3 .list-group #op2').on('click', function (evt) {
        evt.preventDefault();
        $op2.html("");
        $.ajax({
            type: "POST",
            url: '../controller/action/act_verBicicletasPorTipo.php',
            data: { tipo: 3 },
            dataType: "json",
            success: function (response) {

                if (response.success == "1") {
                    for (var i = 0; i < response.bicis.length; i++) {
                        var NewBici = templateBici;
                        var NewModal = templateModal;

                        NewBici = NewBici.replace('{{id}}', 'ruta' + response.bicis[i].id);
                        NewBici = NewBici.replace('{{modelo}}', response.bicis[i].modelo);
                        NewBici = NewBici.replace('{{precio}}', response.bicis[i].precio);
                        NewBici = NewBici.replace('{{imagen}}', response.bicis[i].imagenes[0].imagen);
                        $op2.append(NewBici);

                        NewModal = NewModal.replace('{{id}}', 'ruta' + response.bicis[i].id);
                        NewModal = NewModal.replaceAll('{{ID}}', response.bicis[i].id);
                        NewModal = NewModal.replace('{{modelo}}', response.bicis[i].modelo);
                        NewModal = NewModal.replace('{{marca}}', response.bicis[i].marca);
                        NewModal = NewModal.replace('{{talla}}', response.bicis[i].talla);
                        NewModal = NewModal.replace('{{peso}}', response.bicis[i].peso);
                        NewModal = NewModal.replace('{{tamRueda}}', response.bicis[i].tamRueda);
                        NewModal = NewModal.replace('{{descripcion}}', response.bicis[i].descripcion);
                        NewModal = NewModal.replace('{{imagen}}', response.bicis[i].imagenes[0].imagen);
                        DivModals.append(NewModal);
                    }

                }
                else {
                    Mensaje('error', 'Oops...', jsonData.message);
                }
            }
        });
        $op1.css('display', 'none');
        $op2.css({
            'display': 'block',
            'display': 'flex',
        });
        $op3.css('display', 'none');
        $op4.css('display', 'none');
    });
    $('.container .row .col-lg-3 .list-group #op3').on('click', function (evt) {
        evt.preventDefault();
        $op3.html("");
        $.ajax({
            type: "POST",
            url: '../controller/action/act_verBicicletasPorTipo.php',
            data: { tipo: 4 },
            dataType: "json",
            success: function (response) {

                if (response.success == "1") {
                    for (var i = 0; i < response.bicis.length; i++) {
                        var NewBici = templateBici;
                        var NewModal = templateModal;

                        NewBici = NewBici.replace('{{id}}', 'ruta' + response.bicis[i].id);
                        NewBici = NewBici.replace('{{modelo}}', response.bicis[i].modelo);
                        NewBici = NewBici.replace('{{precio}}', response.bicis[i].precio);
                        NewBici = NewBici.replace('{{imagen}}', response.bicis[i].imagenes[0].imagen);
                        $op3.append(NewBici);

                        NewModal = NewModal.replace('{{id}}', 'ruta' + response.bicis[i].id);
                        NewModal = NewModal.replaceAll('{{ID}}', response.bicis[i].id);
                        NewModal = NewModal.replace('{{modelo}}', response.bicis[i].modelo);
                        NewModal = NewModal.replace('{{marca}}', response.bicis[i].marca);
                        NewModal = NewModal.replace('{{talla}}', response.bicis[i].talla);
                        NewModal = NewModal.replace('{{peso}}', response.bicis[i].peso);
                        NewModal = NewModal.replace('{{tamRueda}}', response.bicis[i].tamRueda);
                        NewModal = NewModal.replace('{{descripcion}}', response.bicis[i].descripcion);
                        NewModal = NewModal.replace('{{imagen}}', response.bicis[i].imagenes[0].imagen);
                        DivModals.append(NewModal);
                    }

                }
                else {
                    Mensaje('error', 'Oops...', jsonData.message);
                }
            }
        });
        $op1.css('display', 'none');
        $op2.css('display', 'none');
        $op3.css({
            'display': 'block',
            'display': 'flex',
        });
        $op4.css('display', 'none');
    });
    $('.container .row .col-lg-3 .list-group #op4').on('click', function (evt) {
        evt.preventDefault();
        $op4.html("");
        $.ajax({
            type: "POST",
            url: '../controller/action/act_verBicicletasPorTipo.php',
            data: { tipo: 5 },
            dataType: "json",
            success: function (response) {
                if (response.success == "1") {
                    for (var i = 0; i < response.bicis.length; i++) {
                        var NewBici = templateBici;
                        var NewModal = templateModal;

                        NewBici = NewBici.replace('{{id}}', 'ruta' + response.bicis[i].id);
                        NewBici = NewBici.replace('{{modelo}}', response.bicis[i].modelo);
                        NewBici = NewBici.replace('{{precio}}', response.bicis[i].precio);
                        NewBici = NewBici.replace('{{imagen}}', response.bicis[i].imagenes[0].imagen);
                        $op4.append(NewBici);

                        NewModal = NewModal.replace('{{id}}', 'ruta' + response.bicis[i].id);
                        NewModal = NewModal.replaceAll('{{ID}}', response.bicis[i].id);
                        NewModal = NewModal.replace('{{modelo}}', response.bicis[i].modelo);
                        NewModal = NewModal.replace('{{marca}}', response.bicis[i].marca);
                        NewModal = NewModal.replace('{{talla}}', response.bicis[i].talla);
                        NewModal = NewModal.replace('{{peso}}', response.bicis[i].peso);
                        NewModal = NewModal.replace('{{tamRueda}}', response.bicis[i].tamRueda);
                        NewModal = NewModal.replace('{{descripcion}}', response.bicis[i].descripcion);
                        NewModal = NewModal.replace('{{imagen}}', response.bicis[i].imagenes[0].imagen);
                        DivModals.append(NewModal);
                    }

                }
                else {
                    Mensaje('error', 'Oops...', jsonData.message);
                }
            }
        });
        $op1.css('display', 'none');
        $op2.css('display', 'none');
        $op3.css('display', 'none');
        $op4.css({
            'display': 'block',
            'display': 'flex',
        });
    });
});

function ReservarBici(id){

    $('#forreser').on('click', function (evt){
        evt.preventDefault();
        var horasContratada = parseInt($('#horaC').val());
        var horaEntregada = $('#horaE').val();
        
        if(horasContratada > 0){
            $.ajax({
                type: "POST",
                url: '../controller/action/act_ReservarBici.php',
                data: { bici : id, horasContratada : horasContratada, horaEntrega : horaEntregada},
                dataType: "json",
                success: function (response){
                    if(response.success == "1"){
                        Mensaje('success', 'Reserva guardada', response.message);
                    }else {
                        Mensaje('error', 'Oops...', response.message);
                    }
    
                },
                error: function (response) {
                    console.log(response);
                }

            })
            horasContratada="";
        }else{
            Mensaje('error', 'Valor invalido', 'Ingrese una hora mayor a cero (0)');
            horasContratada.val("");
        }
    })

}