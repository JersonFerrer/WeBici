<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbUsuario.php');

    if(!isset($_SESSION['ID_USUARIO'])){
        $flag = false;
    }else{
        $idUsuario = $_SESSION['ID_USUARIO'];
        $usuario = verUsuarioPorId($idUsuario);
    }

    if(!isset($_POST['token'])){
        $flag = false;
    }else{
        $token = $_POST['token'];
        $usuario = verUsuarioPorToken($token);        
    }
    
    if(!$flag){
        $newPassword = $_POST['newPassword'];
        $confirmNewPassword = $_POST['confirmNewPassword'];

        if($newPassword == $confirmNewPassword){

            if($usuario != null){
                $usuario->setPassword($newPassword);
                $usuario->setToken(null);
                guardarToken($usuario);
                cambiarPassword($usuario);
            
                echo json_encode(array('success'=>1, 'message'=>'Contraseña actualizada con exito'));
            }else{
                echo json_encode(array('success'=>0, 'message'=>"Verificación inválida"));
            }
        }else{
            echo json_encode(array('success'=>0, 'message'=>'Las contraseñas no coinciden'));
        }
    }else{
        header("location: ../../view/login.php");
    }