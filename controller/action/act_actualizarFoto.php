<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbUsuario.php');

    $idUsuario = $_SESSION['ID_USUARIO'];

    $usuario = verUsuarioPorId($idUsuario);
            
    if($_FILES['image']['name'] != ''){
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension']; // get the extension of the file
        $imagen = $idUsuario. "." . $ext;
        $_SESSION['IMAGEN'] = $imagen;
    }else{
        $imagen = $_SESSION['IMAGEN'];
    }

    //Path of the destination folder on the server
    $destinationFolder = $_SERVER['DOCUMENT_ROOT'] . '/img/';

    //Move image to selected path
    move_uploaded_file($_FILES['image']['tmp_name'], $destinationFolder.$imagen);

    $usuario->setImagen($imagen);

    editarImagen($usuario);

    echo $imagen;