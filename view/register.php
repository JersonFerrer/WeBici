<?php
    session_start();
    if(isset($_SESSION['ID_USUARIO'])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WeBici Registro</title>

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    <!-- Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sb-admin-2.min.css">

    <!-- sweetaleert2 css-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/estilos.css">
</head>
<?php 
    if(isset($_SESSION['ERROR_REGISTRO'])){
?>
<body id="login" class="bg-dark" onload="ErrorRegistro('<?php echo $_SESSION['ERROR_REGISTRO']?>')">
<?php 
    unset($_SESSION['ERROR_REGISTRO']);
?>
<?php 
    }else if(isset($_SESSION['MENSAJE_REGISTRO'])){
?>
<body id="login" class="bg-dark" onload="ExitoRegistro('<?php echo $_SESSION['MENSAJE_REGISTRO']?>')">
<?php 
    unset($_SESSION['MENSAJE_REGISTRO']);
?>
<?php 
    }else{
?>
<body id="register" class="bg-dark">
<?php }?>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">
                <img src="assets/img/WeBici.png" alt="" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#services">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="catalogue.php">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#routes">Rutas</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#team">Nuestros Guías</a></li>
                    <li class="nav-item"><a class="btn btn-primary js-scroll-trigger" href="login.php">Iniciar Sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image passimagen"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea una cuenta!</h1>
                            </div>
                            <form class="user" method="POST" action="../controller/action/act_registrarUsuario.php" onsubmit="return ValidateForm();">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Names"
                                            placeholder="Nombres" name="names">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="LastNames"
                                            placeholder="Apellidos" name="last_names">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nroCedula"
                                        placeholder="Cedula" name="nroCedula">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="InputEmail"
                                        placeholder="Email" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="InputPassword" placeholder="Contraseña" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="RepeatPassword" placeholder="Repita la contraseña" name="repeat_password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Crear cuenta
                                </button>
                                <hr>
                                <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Registrarse con Google
                                </a>
                                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Registrarse con Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Olvidate tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Ya tienes una cuenta? Inicia sesion!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="footer py-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">Copyright © WeBici 2020</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a class="mr-3" href="#!">Privacy Policy</a>
                    <a href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    
    <!-- sweetalert2-->
    <script src="js/sweetalert2.all.min.js"></script>

    <!-- Core theme JS-->
    <script src="js/bootstrap.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/regular_expresions.js"></script>
    <script src="js/registry.js"></script>
</body>

</html>