<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbBicicleta.php');

    echo json_encode(array('success'=>1, 'bicis'=>verBicicletasPorTipo($_POST['tipo'])));