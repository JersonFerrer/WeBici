$(document).ready(function(){

    $('#changePasswordForm').submit(function(e){
        e.preventDefault();
        var newPassword = $('#newPassword');
        var confirmNewPassword = $('#confirmNewPassword');

        var formData = new FormData(document.getElementById("changePasswordForm"));
        var id = getParameterByName('token');
        formData.append("token", id);

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

                        console.log(response);
                        var JsonData = JSON.parse(response);
        
                        if(JsonData.success == 1){
                            MensajeConfirm('success', 'Contraseña Actualizada', JsonData.message, 'user-profile.php');                          
                        }else{
                            MensajeConfirm('error', 'Contraseña No Actualizada', JsonData.message, 'forgot-password.php');
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
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}