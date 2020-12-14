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

    /*public function verRutas(){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM ruta");

        $ruta=null;
        $rutas=array();

        foreach($data_table as $indice => $valor){
            $ruta = new Ruta(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"], 
                    $data_table[$indice]["origen"],
                    $data_table[$indice]["destino"],
                    $data_table[$indice]["descripcion"],
                    $data_table[$indice]["iframeMapa"],
                    $data_table[$indice]["tiempoEstimado"]
                    );
            array_push($rutas,$ruta);
        }

        
        return $rutas;
    }*/
}