<?php
    require_once (__DIR__.'/../mdb/mdbUsuario.php');

    $idUsuario = $_POST['idUsuario'];
    eliminarUsuario($idUsuario);
    echo json_encode(array('success'=>1, 'message'=>"El usuario se ha eliminado correctamente"));
    //header("Location: ../../view/user-profile.php");
    //header("Location: ../../vista/administradorUsuarios.php");
    