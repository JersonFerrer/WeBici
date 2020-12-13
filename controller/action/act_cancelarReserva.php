<?php
    require_once (__DIR__.'/../mdb/mdbReservaBici.php');

    $idReserva = $_POST['idReserva'];
    $reserva = verReservaPorId($idReserva);
    if($reserva->getEstado()== "A"){
        $reserva->setEstado("C");
        modificarEstado($reserva);
        echo json_encode(array('success'=>1, 'message'=>"Reserva cancelada"));
    }else{
        echo json_encode(array('success'=>0, 'message'=>"Reserva ya fue cancelada"));
    }