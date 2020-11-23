<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbUsuario.php');

    if(!isset($_SESSION['ID_USUARIO']) && !isset($_POST['user_id'])){
        header("location: ../../view/login.php");
    }

    if(isset($_SESSION['ID_USUARIO'])){
        $idUsuario = $_SESSION['ID_USUARIO'];
    }else if(isset($_POST['user_id'])){
        $idUsuario = $_POST['user_id'];
    }else{
        echo "error en las variables";
    }
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