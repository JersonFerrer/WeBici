<?php
require_once(__DIR__."/../../model/dao/ReservaBiciDAO.php");

function verReservaPorIdUsuario($IdUsuario){

    $reserva = new ReservaBiciDAO();

    $reservas = $reserva->verReservaPorIdUsuario($IdUsuario);

    return $reservas;
}

function guardarReserva(ReservaBici $reserva){
    
    $dao=new ReservaBiciDAO();

    $reserva = $dao->guardarReserva($reserva);

    return $reserva;
}
function modificarEstado(ReservaBici $reserva){
    $dao=new ReservaBiciDAO();
    $dao->modificarEstado($reserva);
}

function verReservaPorId($idReserva){
    $dao = new ReservaBiciDAO();
    $reserva =$dao-> verReservaPorId($idReserva);
    return $reserva;
}