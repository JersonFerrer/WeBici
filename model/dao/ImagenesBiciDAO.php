<?php

require_once ("DataSource.php");
require_once (__DIR__."/../entity/ImagenesBicicleta.php");

class ImagenesBiciDAO{


    public function guardarImagenesBicicleta(ImagenesBicicleta $imagenes){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO imagenesbicicleta VALUES (NULL,:idBicicleta,:imagenes,:descripcion)"; 
        
        $ultimoIdInsertado = $data_source->ejecutarActualizacion($stmt1, array(
            ':idBicicleta' => $imagenesbicicleta->getIdBicicleta(),
            ':imagenes' => $imagenesbicicleta->getImagen(),
            ':descripcion'=> $imagenesbicicleta->getDescripcion()
            )
        ); 
        
        return $ultimoIdInsertado;
    }

    public function verImagenesBicicletasPorId($Id){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM imagenesbicicleta WHERE idBicicleta = :idBicicleta", array(":idBicicleta"=>$Id));

        $imagenebicicleta=null;
        $imagenesbicicletas=array();

        foreach($data_table as $indice => $valor){
            $imagenebicicleta = new ImagenesBicicleta(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["idBicicleta"], 
                    $data_table[$indice]["imagen"],
                    $data_table[$indice]["descripcion"]
                    );
            array_push($imagenesbicicletas,$imagenebicicleta);
        }
        return $imagenesbicicletas;
    }
}