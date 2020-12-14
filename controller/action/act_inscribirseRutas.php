<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbInscribirseRuta.php");
    require_once (__DIR__."/../../model/entity/InscripcionRuta.php");

    if(isset($_SESSION['ID_USUARIO'])){
        $idHorario = $_POST['idHorario'];
        $idUsuario = $_SESSION['ID_USUARIO'];
        $estado = "A";

        $inscripnRuta = new InscripcionRuta(NULL, $idUsuario, $idHorario, $estado);
        guardarInscripcionRuta($inscripnRuta);
        echo json_encode(array('success'=>1, 'message'=>'Inscripcion Exitosa'));
    }else{
        echo json_encode(array('success'=>0, 'message'=>'Inicie sesion'));
    }

