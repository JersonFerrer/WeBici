<?php
//En esta clase se implementa el patron de diseño DAO, para separar la capa de acceso
//a datos de la lógica de la aplicación. Aqui se crea una instancia de la clase de la 
//conexión para realizar las consultas pertinentes a la base de datos.
//Tambien se llama a las clases planas para guardar la informacion, por ejemplo 
//la clase Bicicleta


//Con require_once se incluye el archivo especificado, en este caso DataSource.php y 
//Bicicleta.php
require_once ("DataSource.php");
require_once (__DIR__."/../entity/HorarioRuta.php");

class HorarioRutaDAO {


    public function guardarHorario(HorarioRuta $horario){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO horarioruta VALUES (NULL,:fecha,:horaSalida,:idRuta)"; 
        
        $ultimoIdInsertado = $data_source->ejecutarActualizacion($stmt1, array(
            ':fecha' => $horario->getFecha(),
            ':horaSalida' => $horario->getHoraSalida(),
            ':idRuta' => $horario->getIdRuta()
            )
        ); 
        
        return $ultimoIdInsertado;
    }

    public function verhorariosPorIdRuta($idRuta){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM horarioruta WHERE idRuta = :idRuta", array(":idRuta"=>$idRuta));

        $horario=null;
        $horarios=array();

        foreach($data_table as $indice => $valor){
            $horario = new HorarioRuta(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["fecha"], 
                    $data_table[$indice]["horaSalida"],
                    $data_table[$indice]["idRuta"]
                    );
            array_push($horarios,$horario);
        } 
        return $horarios;
    }
}