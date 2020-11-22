<?php
    session_start();
    require_once (__DIR__.'/../controller/mdb/mdbBicicleta.php');
    $ruta = json_encode(verBicicletasPorTipo(1));
    $json_ruta = json_decode($ruta);

    $hibridas = json_encode(verBicicletasPorTipo(3));
    $json_hibridas = json_decode($hibridas);

    $urbanas = json_encode(verBicicletasPorTipo(4));
    $json_urbanas = json_decode($urbanas);

    $plegables = json_encode(verBicicletasPorTipo(5));
    $json_plegables = json_decode($plegables);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WeBici Catálogo </title>

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
    <link rel="stylesheet" href="css/shop-homepage.css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body id="catalogue" class="bg-dark">
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger active2" href="catalogue.php">Catálogo</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#routes">Rutas</a></li>
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
                            <img class="img-profile rounded-circle" src="/img/<?php echo $_SESSION['IMAGEN'];?>" alt="">
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
                            <a class="dropdown-item" href="../controller/action/act_logout.php">
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

    <!-- Page Content -->
    <div class="container my-5 pb-5">

        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                    <h1 class="my-4">Tipos de bicicleta</h1>
                    <a href="#" id="op1" class="list-group-item ">Bicicletas de Ruta</a>
                    <a href="#" id="op2" class="list-group-item ">Bicicletas Híbridas</a>
                    <a href="#" id="op3" class="list-group-item ">Bicicletas Urbanas</a>
                    <a href="#" id="op4" class="list-group-item ">Bicicletas plegables</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="assets/img/catalogo/imagen1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="assets/img/catalogo/imagen2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="assets/img/catalogo/imagen3.jpg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="assets/img/catalogo/imagen4.jpg" alt="cuarto slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div id="ruta" class="row">
                    </br>
                    <?php foreach($json_ruta as $valor){?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="catalogue-item">
                            <a class="catalogue-link" data-toggle="modal" href="#ruta<?php echo $valor->{'id'}?>">
                                <div class="catalogue-hover">
                                    <div class="catalogue-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/catalogo/imag1.jpg" alt="" />
                            </a>
                            <div class="catalogue-caption">
                                <div class="catalogue-caption-heading"><?php echo $valor->{'modelo'}?></div>
                                <div class="catalogue-caption-subheading text-muted">$<?php echo $valor->{'precio'}?>/h</div>
                            </div>
                        </div>
                    </div>

                    <!-- catalogue Modals-->
                    <div class="catalogue-modal modal fade" id="ruta<?php echo $valor->{'id'}?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" />
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here-->
                                                <h2 class="text-uppercase"><?php echo $valor->{'modelo'}?></h2>

                                                <img class="img-fluid d-block mx-auto" src="assets/img/catalogo/imag1.jpg" alt="" />
                                                
                                                <ul class="list-inline">
                                                    <li>Marca: <?php echo $valor->{'marca'}?></li>
                                                    <li>Talla: <?php echo $valor->{'talla'}?></li>
                                                    <li>Peso: <?php echo $valor->{'peso'}?></li>
                                                    <li>Tamaño Rueda: <?php echo $valor->{'tamRueda'}?></li>
                                                    <li>ID: <?php echo $valor->{'id'}?></li>
                                                </ul>
                                                <p><?php echo $valor->{'descripcion'}?></p>
                                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                    <i class="fas fa-check mr-1"></i>
                                                    Alquilar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>

                <div id="hibrida" class="row">
                    </br>
                    <?php foreach($json_hibridas as $valor){?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="catalogue-item">
                            <a class="catalogue-link" data-toggle="modal" href="#hibrida<?php echo $valor->{'id'}?>">
                                <div class="catalogue-hover">
                                    <div class="catalogue-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/catalogo/image1.jpg" alt="" />
                            </a>
                            <div class="catalogue-caption">
                                <div class="catalogue-caption-heading"><?php echo $valor->{'modelo'}?></div>
                                <div class="catalogue-caption-subheading text-muted">$<?php echo $valor->{'precio'}?>/h</div>
                            </div>
                        </div>
                    </div>

                    <!-- catalogue Modals-->
                    <div class="catalogue-modal modal fade" id="hibrida<?php echo $valor->{'id'}?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" />
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here-->
                                                <h2 class="text-uppercase"><?php echo $valor->{'modelo'}?></h2>

                                                <img class="img-fluid d-block mx-auto" src="assets/img/catalogo/image1.jpg" alt="" />
                                                
                                                <ul class="list-inline">
                                                    <li>Marca: <?php echo $valor->{'marca'}?></li>
                                                    <li>Talla: <?php echo $valor->{'talla'}?></li>
                                                    <li>Peso: <?php echo $valor->{'peso'}?></li>
                                                    <li>Tamaño Rueda: <?php echo $valor->{'tamRueda'}?></li>
                                                    <li>ID: <?php echo $valor->{'id'}?></li>
                                                </ul>
                                                <p><?php echo $valor->{'descripcion'}?></p>
                                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                    <i class="fas fa-check mr-1"></i>
                                                    Alquilar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>

                <div id="urbanas" class="row">
                    </br>
                    <?php foreach($json_urbanas as $valor){?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="catalogue-item">
                            <a class="catalogue-link" data-toggle="modal" href="#urbana<?php echo $valor->{'id'}?>">
                                <div class="catalogue-hover">
                                    <div class="catalogue-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/catalogo/ima1.jpg" alt="" />
                            </a>
                            <div class="catalogue-caption">
                                <div class="catalogue-caption-heading"><?php echo $valor->{'modelo'}?></div>
                                <div class="catalogue-caption-subheading text-muted">$<?php echo $valor->{'precio'}?>/h</div>
                            </div>
                        </div>
                    </div>

                    <!-- catalogue Modals-->
                    <div class="catalogue-modal modal fade" id="urbana<?php echo $valor->{'id'}?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" />
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here-->
                                                <h2 class="text-uppercase"><?php echo $valor->{'modelo'}?></h2>

                                                <img class="img-fluid d-block mx-auto" src="assets/img/catalogo/ima1.jpg" alt="" />
                                                
                                                <ul class="list-inline">
                                                    <li>Marca: <?php echo $valor->{'marca'}?></li>
                                                    <li>Talla: <?php echo $valor->{'talla'}?></li>
                                                    <li>Peso: <?php echo $valor->{'peso'}?></li>
                                                    <li>Tamaño Rueda: <?php echo $valor->{'tamRueda'}?></li>
                                                    <li>ID: <?php echo $valor->{'id'}?></li>
                                                </ul>
                                                <p><?php echo $valor->{'descripcion'}?></p>
                                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                    <i class="fas fa-check mr-1"></i>
                                                    Alquilar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                
                <div id="plegables" class="row">
                    </br>
                    <?php foreach($json_plegables as $valor){?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="catalogue-item">
                            <a class="catalogue-link" data-toggle="modal" href="#plegable<?php echo $valor->{'id'}?>">
                                <div class="catalogue-hover">
                                    <div class="catalogue-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/catalogo/im1.jpg" alt="" />
                            </a>
                            <div class="catalogue-caption">
                                <div class="catalogue-caption-heading"><?php echo $valor->{'modelo'}?></div>
                                <div class="catalogue-caption-subheading text-muted">$<?php echo $valor->{'precio'}?>/h</div>
                            </div>
                        </div>
                    </div>

                    <!-- catalogue Modals-->
                    <div class="catalogue-modal modal fade" id="plegable<?php echo $valor->{'id'}?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" />
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here-->
                                                <h2 class="text-uppercase"><?php echo $valor->{'modelo'}?></h2>

                                                <img class="img-fluid d-block mx-auto" src="assets/img/catalogo/im1.jpg" alt="" />
                                                
                                                <ul class="list-inline">
                                                    <li>Marca: <?php echo $valor->{'marca'}?></li>
                                                    <li>Talla: <?php echo $valor->{'talla'}?></li>
                                                    <li>Peso: <?php echo $valor->{'peso'}?></li>
                                                    <li>Tamaño Rueda: <?php echo $valor->{'tamRueda'}?></li>
                                                    <li>ID: <?php echo $valor->{'id'}?></li>
                                                </ul>
                                                <p><?php echo $valor->{'descripcion'}?></p>
                                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                    <i class="fas fa-check mr-1"></i>
                                                    Alquilar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

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

    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Core theme JS-->

    <script src="js/bootstrap.js"></script>
    <script src="js/catalogue.js"></script>
</body>

</html>