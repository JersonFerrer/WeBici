<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WeBici Rutas </title>

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
    <link rel="stylesheet" href="css/landing-page.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/routes.css">
</head>

<body id="catalogue" class="bg-light-blue">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top mb-5" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger ml-5" href="index.php">
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger active2" href="routes.html">Rutas</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#team">Nuestros Guías</a>
                    </li>
                     <!--Validacion para mostrar el boton de Iniciar Sesion-->
                     <?php
                        if (!isset($_SESSION['ID_USUARIO'])){
                    ?>
                    <li class="nav-item"><a class="btn btn-primary js-scroll-trigger" href="login.php">Iniciar
                            Sesion</a></li>
                    <?php
                        }
                    ?>
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
                                echo $_SESSION['NOMBRES_USUARIO'];
                            ?>
                            <?php 
                                if($_SESSION['IMAGEN'] != null){
                            ?>
                            <img class="img-profile rounded-circle" src="/img/users/<?php echo $_SESSION['IMAGEN'];?>" alt="profile_image">
                            <?php 
                                }
                            ?>
                        </a>
                        
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="user-profile.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2"></i> Perfil
                            </a>
                            <a class="dropdown-item" href="cambiar_password.php">
                            <i class="fas fa-key fa-sm fa-fw mr-2"></i> Cambiar Contraseña
                            </a>
                            <a class="dropdown-item" href="../controller/action/act_logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> Cerrar Sesion
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

    <!-- Masthead -->
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">Encuentra la ruta ideal para ti!</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="Busca la ruta que quieras...">
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="p-5 mt-5 text-center">
        <h2>Aqui estan todas nuestras rutas</h2>
    </div>
    <!-- Image Showcases -->
    <section class="showcase bg-light py-0">
        <div class="container-fluid p-0" id = "rutas">
            
        </div>
        <div class="modal fade" id="verHorario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Horario de ruta</h5>
                    </div>
                    <form id="horariosRuta" method="POST">
                        <div class="modal-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora Salida</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora Salida</th>
                                <th></th>
                                </tr>
                            </tfoot>
                            </table>    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer py-5 mt-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left text-dark">Copyright © WeBici 2020</div>
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
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/alert_messages.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Core theme JS-->
    <script src="js/ruta.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>