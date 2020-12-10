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