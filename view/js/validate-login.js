//Regular Expresions
var idNumber = /^[0-9]{0,10}$/;
var latin_letters = /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]+$/;
var phoneNumber = /^[0-9-()+]{3,20}/;
var email =  /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;

function EmailValidation(input) {
    let emailtext = input.val();
    if (email.test(emailtext)) {
        return true;
    } else {
        return false;
    }
}

function ValidateLogin() {

    let user = $('#LoginEmail');
    let password = $('#LoginPassword');

    if(user.val() == '' || password.val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Hay campos vacíos',
            footer: '<a href="register.php">Crear una cuenta</a>'
        })
        return false;
    }else if(!EmailValidation(user)){
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