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
                        MensajeConfirm('success','Registro exitoso!',jsonData.message,'login.php');
                    }
                    else
                    {
                        Mensaje('error','Oops...',jsonData.message);
                    }
               }
            });
        }
    });

    $('#Names').keyup(function(){
        if(!LettersValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error','Oops...','Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

    $('#LastNames').keyup(function(){
        if(!LettersValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error','Oops...','Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

    $('#nroCedula').keyup(function(){
        if(!CedulaValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error','Oops...','Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
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
        Mensaje('error','Oops...','Hay campos vacios. LLene todos los campos',);
        return false;
    }else{
        if(!EmailValidation(email)){
            Mensaje('error','Oops...','El email no cumple con la estructura');
            return false;
        }        
        else if (password == repeat_password) {
            return true;
        }else{
            Mensaje('error','Oops...','Las contraseñas no coinciden');
            return false;
        }
    }
}