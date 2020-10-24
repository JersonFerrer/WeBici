<?php
    //Con session_start() se puede iniciar una nueva sesión 
    //o reanudar la sesión existente
    session_start();

    //Con require_once se incluye el archivo mdbUsuario.php
    require_once (__DIR__."/../mdb/mdbUsuario.php");
        
        //Se obtiene el correo y password del formulario del login,
        //los datos son recibidos por el método POST
        $correo = $_POST['login_email'];
        $password = $_POST['login_password'];

        //Se llama a la funcion autenticarUsuario() que esta en mdbUsuario.php
        $user = autenticarUsuario($correo, $password);
        
        if($user != null){
            //Si el usuario fue encontrado, se guarda su ID en una sesión con $_SESSION
            $_SESSION['ID_USUARIO'] = $user->getIdUsuario();
            $_SESSION['NOMBRES_USUARIO'] = $user->getNombres();
            $_SESSION['CORREO'] = $user->getCorreo();
            $_SESSION['IMAGEN'] = $user->getImagen();
            
            header("Location: ../../view/index.php");
           /* if($user->esAdministrador() == 1){
                header("Location: ../../vista/administradorUsuarios.php");                
            }else{
                header("Location: ../../vista/tabata.php");
            }*/

        }else{
            //Si el usuario no existe se vuelve a mostrar el login
            header("Location: ../../view/login.php");
        }



