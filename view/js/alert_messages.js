function Mensaje(icon, title, text){
    Swal.fire({
        icon: icon,
        title: title,
        text: text
    });
}
function MensajeConfirm(icon, title, text, href){
    Swal.fire({
        icon: icon,
        title: title,
        text: text
    }).then((result) => {
        if (result.isConfirmed) {
            location.href=href;
        }else{
            location.href=href;
        }
    });
}