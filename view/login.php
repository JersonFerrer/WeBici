<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WeBici Login</title>
    
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

<body id="login" class="bg-dark">
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger active" href="login.php">Iniciar Sesion</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-5">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" id="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image imagen"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inicia Sesion</h1>
                                    </div>
                                    <form class="user" method="POST" action="../controler/action/act_login.php" onsubmit="return ValidateLogin();">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="LoginEmail" aria-describedby="emailHelp"
                                                placeholder="Ingresa tu email" name="login_email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="LoginPassword" placeholder="Contraseña" name="login_password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Iniciar
                                        </button>
                                        <hr>
                                        <a href="index.php" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Iniciar sesion con Google
                                        </a>
                                        <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Iniciar sesion con Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Recuperar contraseña</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Crear Cuenta!</a>
                                    </div>
                                </div>
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
    <script src="js/validate-login.js"></script>
</body>

</html>