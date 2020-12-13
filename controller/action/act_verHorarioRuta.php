<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbHorarioRuta.php');

    $id = 1;


    $horario = verhorariosPorIdRuta($id);

    echo json_encode(array('data1'=>$horario));