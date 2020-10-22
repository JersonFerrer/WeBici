<?php
   
    //session_destroy();
    
    require_once (__DIR__."/../mdb/mdbUsuario.php");
    require_once (__DIR__."/../../model/entity/Usuario.php");

        $nroCedula = $_POST['nroCedula'];
        $nombres = $_POST['names'];
        $apellidos = $_POST['last_names'];
        $correo = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat_password'];
        $direccion = " ";
        $telefono = " ";
 

        if($password == $repeatPassword){
            $usuario = new Usuario(NULL, $nroCedula, $nombres, $apellidos, $correo, $password, $direccion, $telefono);
            registrarUsuario($usuario);
            header("Location: ../../view/login.php");
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

        
        

