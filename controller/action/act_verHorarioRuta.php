<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbHorarioRuta.php');

    $id = $_POST['idRuta'];


    $horario = verhorariosPorIdRuta($id);

    echo json_encode(array('data1'=>$horario));