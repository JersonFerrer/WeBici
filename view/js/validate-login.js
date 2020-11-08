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
    } else {
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