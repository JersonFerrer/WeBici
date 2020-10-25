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
    <title>WeBici</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/estilos.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#catalogue">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#routes">Rutas</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Nuestros Guías</a></li>
                    <!--Validacion para mostrar el boton de Iniciar Sesion-->
                    <?php
                        if (!isset($_SESSION['ID_USUARIO'])){
                    ?>
                    <li class="nav-item"><a class="btn btn-primary js-scroll-trigger" href="login.php">Iniciar Sesion</a></li>
                    <?php
                        }
                    ?>
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
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Bienvenido a nuestra pagina web</div>
            <div class="masthead-heading text-uppercase">El mejor sitio de alquiler de bicicletas</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Dime más</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Servicios</h2>
                <h3 class="section-subheading text-muted">Estos es lo que podemos ofrecerte</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <span class="fa-stack fa-4x">
                        <img src="assets/img/services/logo-service1.jpg" alt="Servicio de Alquiler de Bicis"
                            class="logo-rent">
                    </span>
                    <h4 class="my-3">Alquiler de Bicicleta</h4>
                    <p class="text-muted">Tenemos diferentes modelos y diseños de bicicleta, elije la que mas te guste
                    </p>
                </div>
                <div class="col-md-6">
                    <span class="fa-stack fa-4x">
                        <img src="assets/img/services/logo-service2.png" alt="Servicio de Rutas para Bicis"
                            class="logo-rut">
                    </span>
                    <h4 class="my-3">Rutas</h4>
                    <p class="text-muted">Ofrecemos diferentes rutas de las zonas urbanas y rurales</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Catálogo Grid-->
    <section class="page-section bg-light-blue" id="catalogue">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Catálogo</h2>
                <h3 class="section-subheading text-muted">Estas son las Bicis más populares</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="catalogue-item">
                        <a class="catalogue-link" data-toggle="modal" href="#catalogueModal1">
                            <div class="catalogue-hover">
                                <div class="catalogue-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/catalogo/ima1.jpg" alt="" />
                        </a>
                        <div class="catalogue-caption">
                            <div class="catalogue-caption-heading">GW Bicicleta Summer</div>
                            <div class="catalogue-caption-subheading text-muted">Urbana</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="catalogue-item">
                        <a class="catalogue-link" data-toggle="modal" href="#catalogueModal2">
                            <div class="catalogue-hover">
                                <div class="catalogue-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/catalogo/image4.jpg" alt="" />
                        </a>
                        <div class="catalogue-caption">
                            <div class="catalogue-caption-heading">Rin 26 con cambios 3x6 Color Verde</div>
                            <div class="catalogue-caption-subheading text-muted">Híbrida</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <div class="catalogue-item">
                        <a class="catalogue-link" data-toggle="modal" href="#catalogueModal5">
                            <div class="catalogue-hover">
                                <div class="catalogue-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/catalogo/imag5.jpg" alt="" />
                        </a>
                        <div class="catalogue-caption">
                            <div class="catalogue-caption-heading">Giant Tcr Advanced 3 Disc 2021</div>
                            <div class="catalogue-caption-subheading text-muted">Ruta</div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mx-auto mt-5">
                    <div class="col">
                        <a href="catalogue.php" class="btn btn-primary btn-xl text-uppercase">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Routes-->
    <section class="page-section" id="routes">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Rutas</h2>
                <h3 class="section-subheading text-muted">Nuestras rutas más populares</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg"
                            alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Ziruma - Areopuerto</h4>
                            <h4 class="subheading">34.84 kilómetros</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Tipo de Ruta: Carretera</p>
                            <p class="text-muted">Tiempo: 2 horas 8 minutos</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg"
                            alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Santa Marta - La Pedrera </h4>
                            <h4 class="subheading">33.45 kilómetros</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Tipo de Ruta: Carretera</p>
                            <p class="text-muted">Tiempo: 1 hora 52 minutos</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg"
                            alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Santa Marta- Minca</h4>
                            <h4 class="subheading">18.53 kilómetros</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Tipo de Ruta: Cicloturismo</p>
                            <p class="text-muted">Tiempo: 57 minutos</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg"
                            alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Santa Marta - Bonda</h4>
                            <h4 class="subheading">13.41 kilómetros </h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Tipo de Ruta: Mountain Bike</p>
                            <p class="text-muted">Tiempo: 2 horas 40 minutos</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            <a href="routes.php" class="text-white">
                                Encuentra
                                <br />
                                Tu ruta
                                <br />
                                Ideal
                            </a>
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light-blue" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestros Guías</h2>
                <h3 class="section-subheading text-muted">Estas en buenas manos</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="" />
                        <h4>Kay Garland</h4>
                        <p class="text-muted">Mountain Bike</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="" />
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Cicloturismo</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="" />
                        <h4>Diana Petersen</h4>
                        <p class="text-muted">Ruta</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque,
                        laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contacto</h2>
                <h3 class="section-subheading text-muted">Envianos tu mensaje</h3>
            </div>
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="name" type="text" placeholder="Nombre *" required="required"
                                data-validation-required-message="Please enter your name." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="Email *"
                                required="required"
                                data-validation-required-message="Please enter your email address." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" id="phone" type="tel" placeholder="Telefono *"
                                required="required"
                                data-validation-required-message="Please enter your phone number." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" id="message" placeholder="Escribe tu mensaje *"
                                required="required"
                                data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div id="success"></div>
                    <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton"
                        type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
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
    <!-- catalogue Modals-->
    <!-- Modal 1-->
    <div class="catalogue-modal modal fade" id="catalogueModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">GW BICICLETA SUMMER - BLANCA</h2>

                                <img class="img-fluid d-block mx-auto" src="assets/img/catalogo/ima1.jpg" alt="" />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>Marca: Dciclas</li>
                                    <li>Género: Unisexo</li>
                                    <li>Tipo de Frenado: Freno de Rin</li>
                                    <li>Suspensión: No</li>
                                    <li>ID: 100024532</li>
                                </ul>
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
    <!-- Modal 2-->
    <div class="catalogue-modal modal fade" id="catalogueModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">Rin 26 con cambios 3x6 Color Verde</h2>

                                <img class="img-fluid d-block mx-auto" src="assets/img/catalogo/image4.jpg" alt="" />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>Marca: Dciclas</li>
                                    <li>Género: Unisexo</li>
                                    <li>Tipo de Frenado: Freno de Rin</li>
                                    <li>Suspensión: No</li>
                                    <li>ID: 100024532</li>
                                </ul>
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

    <!-- Modal 3-->
    <div class="catalogue-modal modal fade" id="catalogueModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">Giant Tcr Advanced 3 Disc 2021</h2>

                                <img class="img-fluid d-block mx-auto" src="assets/img/catalogo/imag5.jpg" alt="" />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>Marca: Giant</li>
                                    <li>Género: Unisexo</li>
                                    <li>Tipo de Frenado: Freno de Rin</li>
                                    <li>Material: Fibra de Carbono</li>
                                    <li>ID: 100036576</li>
                                </ul>
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

    <!-- Bootstrap core JS-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="js/bootstrap.js"></script>
</body>

</html>