$(document).ready(function () {

    $('#btn-edite').click(function () {
        DisabledInputs(false);
        $('#btn-update').show();
        $(this).hide();
    });

    $('#Names').keyup(function(){
        if(!LettersValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error', 'Oops...', 'Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

    $('#LastNames').keyup(function(){
        if(!LettersValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error', 'Oops...', 'Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

    $('#nroCedula').keyup(function(){
        if(!CedulaValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error', 'Oops...', 'Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
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
                        DisabledInputs(true);
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

function DisabledInputs(flag){
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
        Mensaje('error', 'Oops...', 'Hay campos vacíos. Por favor diligencie todos los campos');
        return false;
    }else if(!EmailValidation(email.val())){
        Mensaje('error', 'Oops...', 'El email no cumple con la estructura');
        return false;
    }else {
        return true;
    }
}