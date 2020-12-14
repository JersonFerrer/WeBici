<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbInscribirseRuta.php');


    $idInscripcion = $_POST['idInscripcion'];
    $inscripcion = verInscripcionPorId($idInscripcion);
    if($inscripcion->getEstado()== "A"){
        $inscripcion->setEstado("C");
        modificarEstadoInscripcion($inscripcion);
        echo json_encode(array('success'=>1, 'message'=>"Reserva cancelada"));
    }else{
        echo json_encode(array('success'=>0, 'message'=>"Reserva ya fue cancelada"));
    }