$(document).ready(function (){
    NoLogin();
})

//Regular Expresions
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

function findParam(url, param){ 
    var check = "" + param; 
    if(url.find(check)>=0){ 
        return url.substring(url.search(check)).split('&')[0].split('=')[1]; 
    }
}

function NoLogin(){
    //var url = "localhost/webici/view/login.php?flag=0";
    var url = window.location;
    console.log(url);
    var params = findParam(url,"flag");
    console.log(params);
    if(params == '0'){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El Usuario o la contraseña son incorrectos'
        })
    }
}