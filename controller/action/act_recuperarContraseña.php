<?php

    require_once(__DIR__."/../mdb/mdbUsuario.php");
    require_once(__DIR__."/../funciones/funciones.php");
    require_once(__DIR__.'/../lib/PHPMailer/PHPMailerAutoload.php');
    

    $errors = array();

    if(!empty($_POST)){
        $Usuario = verUsuarioPorCorreo($_POST['email']);

        $email = $Usuario->getCorreo();

        if(!isEmail($email)){
            $errors[] = "Debe ingresar un correo electronico valido";
        }
        if(verificarUsuarioPorCorreo($email)){
            $idUsuario = $Usuario->getIdUsuario();
            $nombres = $Usuario->getNombres();
            $apellidos = $Usuario->getApellidos();

            //$token = generaTokenPass($idUsuario);

            $url = 'http://'.$_SERVER["SERVER_NAME"].'/WeBici/view/cambiarPassword.php?user_id='.$idUsuario;

            $asunto = 'Recuperar Password - WeBici';
            $cuerpo = "Hola $nombres $apellidos: Se ha solicitado un reinicio de contraseña. <br/><br/>
            Para restaurar la contraseña, visita la siguiente direccicion: <a href='$url'>cambiar contrase&ntilde;a</a>";
            
            if(enviarEmail($email, $nombres, $apellidos, $asunto, $cuerpo)){
                
                echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
                echo "<a href='../../view/login.php' >Iniciar Sesion</a>";
                exit;
            }
        }else{
            $errors[] = "La direccion de correo electronico no existe";
        }
    }

    function enviarEmail($email, $nombre, $apellidos, $asunto, $cuerpo){
        /**
         * This example shows making an SMTP connection with authentication.
         */

        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');
        
        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 1;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = "smtp.gmail.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 587;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        //Username to use for SMTP authentication
        $mail->Username = "webicicleta2020@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password = "Payaso2020";
        //Set who the message is to be sent from
        $mail->setFrom('webicicleta2020@gmail.com', utf8_decode('Codigo de Verificación'));
        //Set an alternative reply-to address
        //$mail->addReplyTo('fimimat550@ffeast.com', 'Nuevo');
        //Set who the message is to be sent to
        $mail->addAddress($email, $nombre.$apellidos);
        //Set the subject line
        $mail->Subject = $asunto;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->Body = $cuerpo;
        //Replace the plain text body with one created manually
        
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
                
    }
?>