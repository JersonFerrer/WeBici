$(document).ready(

    $('#changePasswordForm').submit(function(e){
        e.preventDefault();
        var newPassword = $('#newPassword');
        var confirmNewPassword = $('#confirmNewPassword');

        var formData = new FormData(document.getElementById("changePasswordForm"));

        if(newPassword.val() != '' && confirmNewPassword.val() != ''){
            if(newPassword.val() == confirmNewPassword.val()){
                $.ajax({
                    url: "../controller/action/act_cambiarPassword.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
        
                        var JsonData = JSON.parse(response);
        
                        if(JsonData.success == 1){
                            MensajeConfirm('success', 'Contraseña Actualizada', JsonData.message);                          
                        }else{
                            Mensaje('error', 'Contraseña No Actualizada', JsonData.message);
                        }
                    }
                });
            }else{
                Mensaje('error', 'Contraseña No Actualizada', 'Las contraseñas no coinciden, por favor asegurate de que son la misma');
            }
        }else{
            Mensaje('error', 'Oops...', 'Hay campos vacíos, por favor llene todos los campos');
        }
    })
);

function Mensaje(icon, title, text){
    Swal.fire({
        icon: icon,
        title: title,
        text: text
    });
}
function MensajeConfirm(icon, title, text){
    Swal.fire({
        icon: icon,
        title: title,
        text: text
    }).then((result) => {
        if (result.isConfirmed) {
            location.href="user-profile.php";
        }else{
            location.href="user-profile.php";
        }
    });
}