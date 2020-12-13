<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbHorarioRuta.php');

    $idRuta = $_POST['idRuta'];

    echo json_encode(array('success'=>1, 'horario'=>verhorariosPorIdRuta($idRuta)));