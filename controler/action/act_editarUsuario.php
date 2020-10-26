<?php
    
    session_start();
    
    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    
    $idUsuario = $_SESSION['ID_USUARIO'];
    $nroCedula = $_POST['nroCedula'];
    $_SESSION['CEDULA'] = $nroCedula;
    $nombres = $_POST['names'];
    $_SESSION['NOMBRES_USUARIO'] = $nombres;
    $apellidos = $_POST['last_names'];
    $_SESSION['APELLIDOS_USUARIO'] = $apellidos;
    $correo = $_POST['email'];
    $_SESSION['CORREO'] = $correo;
    $direccion = $_POST['address'];
    $_SESSION['DIRECCION'] = $direccion;
    $telefono = $_POST['cellphone'];
    $_SESSION['CELULAR'] = $telefono;
    $password = NULL;

    if($_FILES['image']['name'] != ''){
        $imagen = $_FILES['image']['name'];
        $_SESSION['IMAGEN'] = $imagen;
    }else{
        $imagen = $_SESSION['IMAGEN'];
    }
    //Path of the destination folder on the server
    $destinationFolder = $_SERVER['DOCUMENT_ROOT'] . '/img/';

    //Move image to selected path
    move_uploaded_file($_FILES['image']['tmp_name'], $destinationFolder.$imagen);
    
    $usuario = new Usuario($idUsuario, $nroCedula, $nombres, $apellidos, $correo, $password, $direccion, $telefono, $imagen);

    editarUsuario($usuario);
    header("Location: ../../view/user-profile.php");
    //header("Location: ../../vista/administradorUsuarios.php");
