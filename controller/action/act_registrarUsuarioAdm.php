<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbUsuario.php");
    require_once (__DIR__."/../../model/entity/Usuario.php");

        $nroCedula = $_POST['nroCedula'];
        $nombres = strtoupper($_POST['names']);
        $apellidos = strtoupper($_POST['last_names']);
        $correo = $_POST['email'];
        $password = $_POST['password'];
        $rol = $_POST['rol'];
        $telefono = "";
        $direccion = "";
 
        $existeCedula = verificarUsuarioPorCedula($nroCedula);
        $existeCorreo = verificarUsuarioPorCorreo($correo);
        if($existeCedula != null || $existeCorreo != null){
            echo json_encode(array('success'=>0, 'message'=>'El usuario ya existe'));
        }else{
            $usuario = new Usuario(NULL, $nroCedula, $nombres, $apellidos, $correo, $password, $direccion, $telefono, $rol);
            registrarUsuario($usuario);
            echo json_encode(array('success'=>1, 'message'=>'Usted se ha registrado Exitosamente'));
        }