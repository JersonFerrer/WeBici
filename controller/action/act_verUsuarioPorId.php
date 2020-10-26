<?php
    //session_start();
    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    
    //$idUsuario = $_POST['idUsuario'];
    $idUsuario = $_SESSION['ID_USUARIO'];

    $usuario = verUsuarioPorId($idUsuario);

    json_encode($usuario);
    header('location: ../../view/index.php');