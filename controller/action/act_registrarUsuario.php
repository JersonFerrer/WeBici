<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbUsuario.php");
    require_once (__DIR__."/../../model/entity/Usuario.php");

        $nroCedula = $_POST['nroCedula'];
        $nombres = strtoupper($_POST['names']);
        $apellidos = strtoupper($_POST['last_names']);
        $correo = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat_password'];
        $direccion = " ";
        $telefono = " ";
 

        if($password == $repeatPassword){
            $existeCedula = verificarUsuarioPorCedula($nroCedula);
            $existeCorreo = verificarUsuarioPorCorreo($correo);
            if($existeCedula != null || $existeCorreo != null){
                echo json_encode(array('success'=>0, 'message'=>'El usuario ya existe'));
            }else{
                $usuario = new Usuario(NULL, $nroCedula, $nombres, $apellidos, $correo, $password, $direccion, $telefono);
                registrarUsuario($usuario);
                echo json_encode(array('success'=>1, 'message'=>'Usted se ha registrado Exitosamente'));
            }
        }else{
            echo json_encode(array('success'=>0, 'message'=>'Contraseñas no coinciden'));
        }
        /*if(isset($_POST['administrador'])) {
            $usuario = new Usuario(NULL, $nombre, $correo, $password, $telefono, $fechanac, $sexo, $peso, $administrador);
            registrarUsuario($usuario);
            header("Location: ../../vista/administradorUsuarios.php");
        }else{
            $usuario = new Usuario(NULL, $nombre, $correo, $password, $telefono, $fechanac, $sexo, $peso, 0);
            registrarUsuario($usuario);
            header("Location: ../../vista/login.php");
        }*/

        
        

