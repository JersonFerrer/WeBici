<?php

    require_once(__DIR__."/../mdb/mdbUsuario.php");
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require __DIR__.'/../../lib/PHPMailer/src/Exception.php';
    require __DIR__.'/../../lib/PHPMailer/src/PHPMailer.php';
    require __DIR__.'/../../lib/PHPMailer/src/SMTP.php';


    if(!empty($_POST)){
        $Usuario = verUsuarioPorCorreo($_POST['email']);
        $email = $_POST['email'];

        if(!isEmail($email)){
            echo json_encode(array('success'=>0, 'message'=>'Debe ingresar un correo electronico valido'));
        }else{
            if(verificarUsuarioPorCorreo($email)){
                $idUsuario = $Usuario->getIdUsuario();
                $nombres = $Usuario->getNombres();
                $apellidos = $Usuario->getApellidos();
    
                $token = generateToken();
                $Usuario->setToken($token);
                guardarToken($Usuario);
    
                $url = 'http://'.$_SERVER["SERVER_NAME"].'/WeBici/view/recuperar_password.php?token='.$token;
                
    
                $asunto = 'Recuperar Password - WeBici';
                $cuerpo = "Hola $nombres $apellidos: <br/><br/>Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>
                Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url' target='_blank'>cambiar contrase&ntilde;a</a>";
                
                if(enviarEmail($email, $nombres, $apellidos, $asunto, $cuerpo, $url)){ 
                    echo json_encode(array('success'=>1, 'message'=>"Hemos enviado un correo electronico a $email para restablecer tu password."));
                }
            }else{
                echo json_encode(array('success'=>0, 'message'=>'La direccion de correo electronico no existe'));
            }
        }
    }else{
        echo json_encode(array('success'=>0, 'message'=>'error en el POST'));
    }

    function enviarEmail($email, $nombres, $apellidos, $asunto, $cuerpo, $url){
        /**
         * This example shows making an SMTP connection with authentication.
         */

        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');

        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        $mail -> charSet = "UTF-8";
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
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
        $mail->setFrom('webicicleta2020@gmail.com', utf8_decode('Correo de Recuperación'));
        //Set an alternative reply-to address
        //$mail->addReplyTo('fimimat550@ffeast.com', 'Nuevo');
        //Set who the message is to be sent to
        $mail->addAddress($email, $nombres.$apellidos);
        //Set the subject line
        $mail->Subject = $asunto;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->Body = ;
        $body = file_get_contents('../../view/template_invoice.html');
        $body = str_replace("Company Name", "WeBici", $body);
        $body = str_replace("Usuario", "$nombres $apellidos", $body);
        $body = str_replace('href="#url"', 'href="'.$url.'"', $body);
        $body = str_replace('URL', $url, $body);

        $mail->msgHTML($body);
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Prueba de mensaje enviado por correo';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }      
    }

    function isEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}
	

	function validaPassword($var1, $var2){
		if (strcmp($var1, $var2) !== 0){
			return false;
		}else{
			return true;
		}
	}
	
	function generateToken(){
		$gen = uniqid(mt_rand(), false).time();
		return $gen;
	}
	
	function resultBlock($errors){
		if(count($errors) > 0){
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error){
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}
?>