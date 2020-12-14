<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="css/style.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/sweetalert2.min.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
        <div class="sidebar-brand-icon">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <img src="../assets/img/WeBici.png" alt="" />
            </a>
        </div>
      </a>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
        <i class="fas fa-bicycle"></i>
          <span>WeBici</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Usuarios</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php 
                  if (isset($_SESSION['ID_USUARIO'])){
                ?>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php 
                    echo $_SESSION['NOMBRES_USUARIO'];
                  ?>
                </span>
                <?php 
                  if($_SESSION['IMAGEN'] != null){
                ?>
                <img class="img-profile rounded-circle" src="/img/users/<?php echo $_SESSION['IMAGEN'];?>">
                <?php 
                    }
                  }
                ?>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
              <h6 class="m-0 font-weight-bold text-primary">Tabla de usuario</h6>
              <div class = "ml-auto"><button class = "btn btn-primary" id="agregarUser" data-toggle= "modal" href = "#nuevoUser"><i class="fas fa-user-plus"></i></button></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cedula</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Correo</th>
                      <th>Direccion</th>
                      <th>Telefono</th>
                      <th>Rol</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Cedula</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Correo</th>
                      <th>Direccion</th>
                      <th>Telefono</th>
                      <th>Rol</th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar usuario</h5>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="idUsuario" class="form-label">IdUsuario</label>
                  <input type="text"  id="idUsuario" class="form-control" readonly="readonly">
                </div>
                <div class="mb-3">
                  <label for="cedula" class="form-label">Cedula</label>
                  <input type="number" class="form-control" id="cedula" readonly="readonly">
                </div>
                <div class="mb-3">
                  <label for="nombres" class="form-label">Nombres</label>
                  <input type="text" class="form-control" id="nombres">
                </div>
                <div class="mb-3">
                  <label for="apellidos" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" id="apellidos">
                </div>
                <div class="mb-3">
                  <label for="correo" class="form-label">Correo</label>
                  <input type="text" class="form-control" id="correo">
                </div>
                <div class="mb-3">
                  <label for="direccion" class="form-label">Direccion</label>
                  <input type="text" class="form-control" id="direccion">
                </div>
                <div class="mb-3">
                  <label for="telefono" class="form-label">Telefono</label>
                  <input type="text" class="form-control" id="telefono">
                </div>
                <div class="mb-3">
                  <label for="rol" class="form-label">Rol</label>
                  <input type="text" class="form-control" id="rol">
                </div> 
                
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" href = "#modalconfi">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal" tabindex="-1" id= "modalconfi">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">¡Advertencia!</h5>
              
            </div>
            <div class="modal-body">
              <p>¿Seguro que quieres modificar este usuario?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardar">Confirmar</button>

            </div>
          </div>
        </div>
      </div>
      <div class="modal" tabindex="-1" id= "modalelim">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">¡Advertencia!</h5>
              
            </div>
            <div class="modal-body">
              <p>¿Seguro que quieres eliminar este usuario?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="eliminar">Eliminar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="nuevoUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
            </div>
            <div class="modal-body">
              <form id = "nuevoUserform" method="POST">
                <div class="mb-3">
                  <label for="nuevacedula" class="form-label">Cedula</label>
                  <input type="number" name="nroCedula" class="form-control" id="nuevacedula" placeholder = "Cedula">
                </div>
                <div class="mb-3">
                  <label for="nuevanombres" class="form-label">Nombres</label>
                  <input type="text" name="names" class="form-control" id="nuevanombres" placeholder = "Nombres">
                </div>
                <div class="mb-3">
                  <label for="nuevaapellidos" class="form-label">Apellidos</label>
                  <input type="text" name="last_names" class="form-control" id="nuevaapellidos" placeholder = "Apellidos">
                </div>
                <div class="mb-3">
                  <label for="nuevacorreo" class="form-label">Correo</label>
                  <input type="text" name="email" class="form-control" id="nuevacorreo" placeholder = "Correo">
                </div>
                <div class="mb-3">
                  <label for="nuevacontrasena" class="form-label">Contraseña</label>
                  <input type="password" name="password" class="form-control" id="nuevacontrasena" placeholder = "Contraseña">
                </div>
                <div class="mb-3">
                  <label for="nuevarol" class="form-label">Rol</label>
                  <input type="text" name="rol" class="form-control" id="nuevarol" placeholder = "Rol">
                </div> 
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary" data-toggle="modal">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  
  <script src="../js/sweetalert2.all.min.js"></script>
  <script src="../js/regular_expresions.js"></script>
  <script src="../js/alert_messages.js"></script>
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
