<?php
    session_start();
    include 'conexion.php';
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");
    if(mysqli_num_rows($validar_login)>0){
        $user = mysqli_query($conexion,"SELECT * FROM usuarios WHERE  correo = '$correo'");
        $fila = mysqli_fetch_array($user);
        $_SESSION['usuario'] = $fila['usuario'];
        header("location: ../bienvenido.php");
        exit();
    }else{
        echo '
            <script>
                alert("Contraseña o Correo incorrecto");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }
?>