<?php
//En esta clase se implementa el patron de diseño DAO, para separar la capa de acceso
//a datos de la lógica de la aplicación. Aqui se crea una instancia de la clase de la 
//conexión para realizar las consultas pertinentes a la base de datos.
//Tambien se llama a las clases planas para guardar la informacion, por ejemplo 
//la clase Bicicleta


//Con require_once se incluye el archivo especificado, en este caso DataSource.php y 
//Bicicleta.php
require_once ("DataSource.php");
require_once (__DIR__."/../entity/InscripcionRuta.php");
require_once (__DIR__.'/../entity/VistaInscripcionRuta.php');

class InscripcionRutaDAO {


    public function guardarInscripcion(InscripcionRuta $inscripcion){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO inscripcionruta VALUES (NULL,:idUsuario,:idHorarioRuta,:estado)"; 
        
        $ultimoIdInsertado = $data_source->ejecutarActualizacion($stmt1, array(
            ':idUsuario' => $inscripcion->getIdUsuario(),
            ':idHorarioRuta' => $inscripcion->getIdHorarioRuta(),
            ':estado' => $inscripcion->getEstado()
            )
        ); 
        
        return $ultimoIdInsertado;
    }

    public function consultarInscripcionesPorIdUsuario($idUsuario){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT inscripcionruta.id, horarioruta.fecha, ruta.origen, ruta.destino, ruta.tiempoEstimado, horarioruta.horaSalida, inscripcionruta.estado FROM inscripcionruta INNER JOIN horarioruta ON horarioruta.id = inscripcionruta.idHorarioRuta INNER JOIN ruta ON ruta.id = horarioruta.idRuta INNER JOIN usuario ON usuario.id = inscripcionruta.idUsuario WHERE usuario.id = :idUsuario", array(":idUsuario"=>$idUsuario));

        $inscripcion=null;
        $inscripciones=array();

        foreach($data_table as $indice => $valor){
            $inscripcion = new VistaInscripcionRuta(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["fecha"], 
                    $data_table[$indice]["origen"],
                    $data_table[$indice]["destino"],
                    $data_table[$indice]["tiempoEstimado"],
                    $data_table[$indice]["horaSalida"],
                    $data_table[$indice]["estado"]
                    );
            array_push($inscripciones,$inscripcion);
        }

        
        return $inscripciones;
    }
}