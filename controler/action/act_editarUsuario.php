<?php
    
    session_start();
    
    require_once (__DIR__.'/../mdb/mdbUsuario.php');

    $nroCedula = $_POST['nroCedula'];
    $nombres = strtoupper($_POST['names']);
    $apellidos = strtoupper($_POST['last_names']);
    $correo = $_POST['email'];
    $direccion = strtoupper($_POST['address']);
    $telefono = $_POST['cellphone'];
    $password = NULL;
    
    if($nroCedula != '' && $nombres != '' && $apellidos != '' && $correo != '' && $direccion != '' && $direccion != ''){
        $idUsuario = $_SESSION['ID_USUARIO'];
        $_SESSION['CEDULA'] = $nroCedula;
        $_SESSION['NOMBRES_USUARIO'] = $nombres;
        $_SESSION['APELLIDOS_USUARIO'] = $apellidos;
        $_SESSION['CORREO'] = $correo;
        $_SESSION['DIRECCION'] = $direccion;
        $_SESSION['CELULAR'] = $telefono;
    
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
    }