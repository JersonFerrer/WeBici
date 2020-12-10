<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbReservaBici.php");
    require_once (__DIR__."/../../model/entity/ReservaBici.php");

        if(isset($_SESSION['ID_USUARIO'])){
            $idBici = $_POST['bici'];
            $idUsuario = $_SESSION['ID_USUARIO'];
            $horasContratadas = $_POST['horasContratada'];
            $horaEntrega = $_POST['horaEntrega'];
            //$horaDevolucion = $_POST['horaDevolucion'];
            $fecha = date("Y-m-d");
            $estado = "A";
            $horaDevolucion = new DateTime();
            $horaDevolucion->modify("+$horasContratadas hours");

            $reserva = new ReservaBici(NULL, $fecha, $horasContratadas, $horaEntrega, $horaDevolucion, $idUsuario, $idBici, $estado);
            guardarReserva($reserva);
            echo json_encode(array('success'=>1, 'message'=>'Reserva Exitosa'));
        }else{
            echo json_encode(array('success'=>0, 'message'=>'Inicie sesion'));
        }