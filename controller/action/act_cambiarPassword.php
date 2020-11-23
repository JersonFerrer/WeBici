<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    
    $idUsuario = $_SESSION['ID_USUARIO'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if($newPassword == $confirmNewPassword){
        
        $usuario = verUsuarioPorId($idUsuario);

        $usuario->setPassword($newPassword);
        cambiarPassword($usuario);
        
        echo json_encode(array('success'=>1, 'message'=>'Contraseña actualizada con exito'));
    }else{
        echo json_encode(array('success'=>0, 'message'=>'Las contraseñas no coinciden'));
    }