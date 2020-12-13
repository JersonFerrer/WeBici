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
    $rol = $_POST['rol'];
    
    
    
    if($nroCedula != '' && $nombres != '' && $apellidos != '' && $correo != '' && $direccion != '' && $telefono != ''){
        $idUsuario = $_SESSION['ID_USUARIO'];
        $_SESSION['NOMBRES_USUARIO'] = $nombres;
        
        $usuario = new Usuario($idUsuario, $nroCedula, $nombres, $apellidos, $correo, $password, $direccion, $telefono, $rol);
    
        editarUsuario($usuario);
        echo json_encode(array('success'=>1, 'userData'=>$usuario));
        //header("Location: ../../view/user-profile.php");
        //header("Location: ../../vista/administradorUsuarios.php");
    }
