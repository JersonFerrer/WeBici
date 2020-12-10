<?php
//En esta clase se implementa el patron de diseño DAO, para separar la capa de acceso
//a datos de la lógica de la aplicación. Aqui se crea una instancia de la clase de la 
//conexión para realizar las consultas pertinentes a la base de datos.
//Tambien se llama a las clases planas para guardar la informacion, por ejemplo 
//la clase Bicicleta


//Con require_once se incluye el archivo especificado, en este caso DataSource.php y 
//Bicicleta.php
require_once ("DataSource.php");
require_once (__DIR__."/../entity/ReservaBici.php");
require_once (__DIR__."/../../controller/mdb/mdbImagenesBici.php");

class ReservaBiciDAO {


    public function guardarReserva(ReservaBici $reserva){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO reservabici VALUES (NULL,:fecha,:horasContratadas,:horaEntrega,:horaDevolucion,:idUsuario,:idBicicleta,:estado)"; 
        
        $ultimoIdInsertado = $data_source->ejecutarActualizacion($stmt1, array(
            ':fecha' => $reserva->getFecha(),
            ':horasContratadas' => $reserva->getHorasContratadas(),
            ':horaEntrega' => $reserva->getHoraEntrega(),
            ':horaDevolucion'=> $reserva->getHoraDevolucion(),
            ':idUsuario'=> $reserva->getIdUsuario(),
            ':idBicicleta'=> $reserva->getIdBicicleta(),
            ':estado'=> $reserva->getEstado()
            )
        ); 
        
        return $ultimoIdInsertado;
    }

    public function verReservaPorIdUsuario($IdUsuario){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM reservabici WHERE idUsuario=:idUsuario", array(":idUsuario"=>$IdUsuario));

        $reserva=null;
        $reservas=array();

        foreach($data_table as $indice => $valor){
            $reserva = new ReservaBici(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["fecha"], 
                    $data_table[$indice]["horasContratadas"],
                    $data_table[$indice]["horaEntregada"],
                    $data_table[$indice]["horaDevolucion"],
                    $data_table[$indice]["idUsuario"],
                    $data_table[$indice]["idBicicleta"],
                    $data_table[$indice]["estado"]
                    );
            array_push($reservas,$reserva);
        }

        
        return $reservas;
    }
}