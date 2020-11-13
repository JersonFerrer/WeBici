$(document).ready(function (){

    $('#registryform').submit(function(e) {
        e.preventDefault();
        if(ValidateForm()){
            $.ajax({
                type: "POST",
                url: '../controller/action/act_registrarUsuario.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
     
                    // user is successfully register in the back-end
                    if (jsonData.success == "1")
                    {
                        ExitoRegistro(jsonData.message);
                    }
                    else
                    {
                        ErrorRegistro(jsonData.message);
                    }
               }
            });
        }
    });

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
function ExitoRegistro(msg){
    Swal.fire({
        icon: 'success',
        title: 'Registro exitoso!',
        text: msg,
        confirmButtonText: 'Ir a login'
    }).then((result) => {
            if (result.isConfirmed) {
                location.href="login.php";
            }else{
                location.href="login.php";
            }
        })
}