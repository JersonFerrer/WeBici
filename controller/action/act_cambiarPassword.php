<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
    $usuario = null;

    if($newPassword == $confirmNewPassword){

        if(isset($_SESSION['ID_USUARIO'])){
            $idUsuario = $_SESSION['ID_USUARIO'];
            $usuario = verUsuarioPorId($idUsuario);
        }
    
        if(isset($_POST['token']) && $_POST['token'] !=''){
            $token = $_POST['token'];
            $usuario = verUsuarioPorToken($token);   
        }

        if($usuario != null){
            $usuario->setPassword($newPassword);
            cambiarPassword($usuario);
            $usuario->setToken(null);
            guardarToken($usuario);
            
            echo json_encode(array('success'=>1, 'message'=>'Contraseña actualizada con exito'));
        }else{
            echo json_encode(array('success'=>0, 'message'=>"Verificación inválida"));
        }
    }else{
        echo json_encode(array('success'=>0, 'message'=>'Las contraseñas no coinciden'));
    }