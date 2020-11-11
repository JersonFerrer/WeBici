$(document).ready(function(){

    $('#loginform').submit(function(e) {
        e.preventDefault();
        if(ValidateLogin()){
            $.ajax({
                type: "POST",
                url: '../controller/action/act_login.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
     
                    // user is logged in successfully in the back-end
                    // let's redirect
                    if (jsonData.success == "1")
                    {
                        location.href = 'index.php';
                    }
                    else
                    {
                        MensajeError(jsonData.message);
                    }
               }
            });
        }
     });
});

function ValidateLogin() {

    let user = $('#LoginEmail');
    let password = $('#LoginPassword');

    if (user.val() == '' || password.val() == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Hay campos vacíos',
            footer: '<a href="register.php">Crear una cuenta</a>'
        })
        return false;
    } else if (!EmailValidation(user.val())) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El correo no cumple con la estructura'
        })
        user.val('');
        password.val('');
        return false;
    }else{
        return true;
    }
}

function MensajeError($msg) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: $msg
    })
}