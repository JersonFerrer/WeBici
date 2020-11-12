$(document).ready(function () {

    $('#btn-edite').click(function () {
        $('#Names').prop('disabled', false);
        $('#LastNames').prop('disabled', false);
        $('#nroCedula').prop('disabled', false);
        $('#InputEmail').prop('disabled', false);
        $('#address').prop('disabled', false);
        $('#cellphone').prop('disabled', false);
        $('#btn-update').attr('style', 'display:block');
        $(this).attr('style', 'display:none');
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