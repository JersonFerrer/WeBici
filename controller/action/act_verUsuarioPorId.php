<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    
    $idUsuario = $_POST['idUsuario'];

    $usuario = verUsuarioPorId($idUsuario);
    
    $jsonUsuario = json_encode($usuario);