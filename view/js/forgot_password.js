$(document).ready(function(){
    $('#sendRecoveryForm').submit(function(e){
        e.preventDefault();
        var email = $('#email');

        var formData = new FormData(document.getElementById("sendRecoveryForm"));

        if(email.val() != ''){
            if(EmailValidation(email.val())){
                $.ajax({
                    url: "../controller/action/act_enviarRecuperacion.php",
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
                Mensaje('error', 'Oops...', 'Ingrese un email valido');
            }
        }else{
            Mensaje('error', 'Oops...', 'Ingrese un email por favor');
        }
    })
});

function Mensaje(icon, title, text){
    Swal.fire({
        icon: icon,
        title: title,
        text: text
    });
}