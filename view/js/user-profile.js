$(document).ready(function () {

    $('#btn-edite').click(function () {
        DisabledInput(false);
        $('#btn-update').show();
        $(this).hide();
    });

    $('#userForm').submit(function (e) {
        e.preventDefault();
       
        var formData = new FormData(document.getElementById("userForm"));
        
        if(ValidateData()){
            $.ajax({
                url: "../controller/action/act_editarUsuario.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
    
                    let JsonData = JSON.parse(response);
    
                    if(JsonData.success == 1){
                        $('#Names').val(JsonData.userData.nombres);
                        $('#LastNames').val(JsonData.userData.apellidos);
                        $('#nroCedula').val(JsonData.userData.nroCedula);
                        $('#InputEmail').val(JsonData.userData.correo);
                        $('#address').val(JsonData.userData.direccion);
                        $('#cellphone').val(JsonData.userData.telefono);
                        DisabledInput(true);
                        $('#btn-update').hide();
                        $('#btn-edite').show();
                        
                    }else{
                        alert('error');
                    }
                }
            });
        }
    });

    $('#btnImageUpdate').click(function(){
        $('#image').click();
    });

    $('#image').change(function () {
       
        var formData = new FormData(document.getElementById("imageForm"));
        
        $.ajax({
            url: "../controller/action/act_actualizarFoto.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                let ruta = '/img/'+response+'?'+ new Date().getTime();
                $('#profileImg').attr('src', ruta);
                $('#profileImgNavbar').attr('src', ruta);
            }
        })
    });
});

function DisabledInput(flag){
    $('#Names').prop('disabled', flag);
    $('#LastNames').prop('disabled', flag);
    $('#nroCedula').prop('disabled', flag);
    $('#InputEmail').prop('disabled', flag);
    $('#address').prop('disabled', flag);
    $('#cellphone').prop('disabled', flag);
}
function ValidateData() {
    let names = $('#Names');
    let lastNames = $('#LastNames');
    let nroCedula = $('#nroCedula');
    let email = $('#InputEmail');
    let address = $('#address');
    let cellphone = $('#cellphone');

    if (names.val() == '' || lastNames.val() == '' || nroCedula.val() == '' || email.val() == '' || address.val() == '' || cellphone.val() == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Hay campos vacíos. Por favor diligencie todos los campos',
        })
        return false;
    } else {
        return true;
    }
}