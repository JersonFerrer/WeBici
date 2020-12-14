<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbInscribirseRuta.php');

    $idUsuario = $_SESSION['ID_USUARIO'];
    $inscripcion = consultarInscripcionesPorIdUsuario($idUsuario);

    echo json_encode(array('data'=>$inscripcion));
    //echo json_encode(array('success'=>1, 'message'=>"Vista reserva"));
    