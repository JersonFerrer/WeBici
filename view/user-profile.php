<?php
    session_start();
    if(!isset($_SESSION['ID_USUARIO'])){
        header("location: session-error.html");
        session_destroy();
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WeBici - Perfil</title>

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
    <link rel="stylesheet" href="css/profile-styles.css">
</head>

<body id="user-profile" class="bg-dark">
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#services">Servicios</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="catalogue.php">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#routes">Rutas</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#team">Nuestros Guías</a>
                    </li>
                </ul>
                <!--Validacion para mostrar el usuario-->
                <?php 
                    if (isset($_SESSION['ID_USUARIO'])){
                ?>
                <ul class="navbar-nav">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <?php 
                                echo strtoupper($_SESSION['NOMBRES_USUARIO']);
                            ?>
                            <?php 
                                if($_SESSION['IMAGEN'] != null){
                            ?>
                            <img class="img-profile rounded-circle" src="/img/<?php echo $_SESSION['IMAGEN'];?>" alt="">
                            <?php 
                                }else{
                            ?>
                            <img class="img-profile rounded-circle" src="/img/avatar.png" alt="">
                            <?php 
                                }
                            ?>
                        </a>

                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="user-profile.php">
                                Perfil
                            </a>
                            <a class="dropdown-item" href="../controler/action/act_logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar Sesion
                            </a>
                        </div>
                    </li>
                </ul>
                <?php 
                    }//fin de la validacion para mostrar usuario
                ?>
            </div>
        </div>
    </nav>

    <div class="container pt-5 mt-5">
    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="mx-auto pt-4">
                        <img class="profile-img rounded-circle" src="/img/<?php echo $_SESSION['IMAGEN'];?>" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="mx-auto">
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="mx-auto col-lg-7">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edita tus datos cuando quieras</h1>
                            </div>
                            <form class="user" method="POST" action="../controler/action/act_registrarUsuario.php" onsubmit="return ValidateForm();">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Names"
                                            placeholder="Nombres" name="names" value="<?php echo strtoupper($_SESSION['NOMBRES_USUARIO']);?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="LastNames"
                                            placeholder="Apellidos" name="last_names" value="<?php echo strtoupper($_SESSION['APELLIDOS_USUARIO']);?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nroCedula"
                                        placeholder="Cedula" name="nroCedula" value="<?php echo $_SESSION['CEDULA'];?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="InputEmail"
                                        placeholder="Email" name="email" value="<?php echo $_SESSION['CORREO'];?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="address"
                                        placeholder="Dirección" name="address" value="<?php echo $_SESSION['DIRECCION'];?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="cellphone"
                                        placeholder="Celular" name="cellphone" value="<?php echo $_SESSION['CELULAR'];?>">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Editar Datos
                                </button>
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
    <script src="js/registry.js"></script>
</body>

</html>