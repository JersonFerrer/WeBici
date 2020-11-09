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
                $_SESSION['ERROR_REGISTRO'] = 'El usuario ya existe';
                header("Location: ../../view/register.php");
            }else{
                $usuario = new Usuario(NULL, $nroCedula, $nombres, $apellidos, $correo, $password, $direccion, $telefono, NULL);
                registrarUsuario($usuario);
                $_SESSION['MENSAJE_REGISTRO'] = 'Usted se ha registrado Exitosamente';
                header("Location: ../../view/register.php");
            }
        }else{
            echo "Contraseñas no coinciden";
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

        
        

