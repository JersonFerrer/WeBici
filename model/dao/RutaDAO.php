<?php
//En esta clase se implementa el patron de diseño DAO, para separar la capa de acceso
//a datos de la lógica de la aplicación. Aqui se crea una instancia de la clase de la 
//conexión para realizar las consultas pertinentes a la base de datos.
//Tambien se llama a las clases planas para guardar la informacion, por ejemplo 
//la clase Bicicleta


//Con require_once se incluye el archivo especificado, en este caso DataSource.php y 
//Bicicleta.php
require_once ("DataSource.php");
require_once (__DIR__."/../entity/Ruta.php");

class RutaDAO {


    public function guardarRuta(Ruta $ruta){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO ruta VALUES (NULL,:nombre,:origen,:destino,:descripcion,:iframeMapa,:tiempoEstimado)"; 
        
        $ultimoIdInsertado = $data_source->ejecutarActualizacion($stmt1, array(
            ':nombre' => $ruta->getNombre(),
            ':origen' => $ruta->getOrigen(),
            ':destino' => $ruta->getDestino(),
            ':descripcion'=> $ruta->getDescripcion(),
            ':iframeMapa'=> $ruta->getIframeMapa(),
            ':tiempoEstimado'=> $ruta->getTiempoEstimado()
            )
        ); 
        
        return $ultimoIdInsertado;
    }

    public function verRutas(){
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
    }
}