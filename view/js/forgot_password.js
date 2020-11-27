$(document).ready(function(){
    
    $('#sendRecoveryForm').submit(function(e){
        e.preventDefault();
        var email = $('#email');
        var formData = new FormData(document.getElementById("sendRecoveryForm"));

        if(email.val() != ''){
            if(EmailValidation(email.val())){
                Swal.fire({
                    title: 'Espere un momento...',
                    text:'Estamos enviandole un correo de recuperacion',
                    willOpen: () => {
                        Swal.showLoading();
                      }
                });
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
                            MensajeConfirm('info', 'Revisa tu correo', JsonData.message, 'login.php');                          
                        }else{
                            Mensaje('error', 'Oops...', JsonData.message);
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