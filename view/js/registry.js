function ValidateForm(){
    let password = $('#InputPassword').val();
    let repeat_password = $('#RepeatPassword').val();

    if (password == repeat_password) {
        return true;
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las contraseñas no coinciden',
        })
        return false;
    }
}