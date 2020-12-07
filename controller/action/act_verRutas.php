<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbRuta.php');

    echo json_encode(array('success'=>1, 'rutas'=>verRutas()));