<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbReservaBici.php');

    $idUsuario = $_SESSION['ID_USUARIO'];

    echo json_encode(array('data'=>verReservaPorIdUsuario($idUsuario)));