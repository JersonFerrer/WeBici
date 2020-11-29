//Regular expresions
var cedula = /^[0-9]{0,10}$/;
var email = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;
var letras_latinas = /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/;
var phoneNumber = /^[0-9-()+]{3,20}/;

function EmailValidation(input) {
    if (email.test(input)) {
        return true;
    } else {
        return false;
    }
}
function LettersValidation(input) {
    if (letras_latinas.test(input)) {
        return true;
    } else {
        return false;
    }
}
function CedulaValidation(input) {
    if (cedula.test(input)) {
        return true;
    } else {
        return false;
    }
}
function PhoneValidation(input) {
    if (phoneNumber.test(input)) {
        return true;
    } else {
        return false;
    }
}