$(document).ready(function (){

    $('#Names').keyup(function(){
        if(!LettersValidation($(this).val()) && $(this).val() != ''){
            ErrorRegistro('Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

    $('#LastNames').keyup(function(){
        if(!LettersValidation($(this).val()) && $(this).val() != ''){
            ErrorRegistro('Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

    $('#nroCedula').keyup(function(){
        if(!CedulaValidation($(this).val()) && $(this).val() != ''){
            ErrorRegistro('Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });
});

function ValidateForm() {
    let names = $('#Names').val();
    let lastnames = $('#LastNames').val();
    let nroCedula = $('#nroCedula').val();
    let email = $('#InputEmail').val();
    let password = $('#InputPassword').val();
    let repeat_password = $('#RepeatPassword').val();

    if(password == '' || repeat_password == '' || names == '' || lastnames == '' || nroCedula == '' || email == ''){
        ErrorRegistro('Hay campos vacios. LLene todos los campos',);
        return false;
    }else{
        if(!EmailValidation(email)){
            ErrorRegistro('El email no cumple con la estructura');
            return false;
        }        
        else if (password == repeat_password) {
            return true;
        }else{
            ErrorRegistro('Las contraseñas no coinciden');
            return false;
        }
    }
}

function ErrorRegistro(msg){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: msg
    })
}