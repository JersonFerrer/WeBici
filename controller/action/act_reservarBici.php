<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbReservaBici.php");
    require_once (__DIR__."/../../model/entity/ReservaBici.php");

        if(isset($_SESSION['ID_USUARIO'])){
            $idBici = $_POST['bici'];
            $idUsuario = $_SESSION['ID_USUARIO'];
            $horasContratadas = $_POST['horasContratadas'];
            $horaEntrega = $_POST['horaEntrega'];
            $horaDevolucion = $_POST['horaDevolucion'];
            $fecha = date("Y-m-d");
            $estado = "A";
            $reserva = new ReservaBici(NULL, $fecha, "7", "12:00", "20:00", $idUsuario, "1", $estado);
            guardarReserva($reserva);
            echo json_encode(array('success'=>1, 'message'=>'Reserva Exitosa'));
        }else{
            echo json_encode(array('success'=>0, 'message'=>'Inicie sesion'));
        }