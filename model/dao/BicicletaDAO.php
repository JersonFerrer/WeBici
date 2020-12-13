<?php
//En esta clase se implementa el patron de diseño DAO, para separar la capa de acceso
//a datos de la lógica de la aplicación. Aqui se crea una instancia de la clase de la 
//conexión para realizar las consultas pertinentes a la base de datos.
//Tambien se llama a las clases planas para guardar la informacion, por ejemplo 
//la clase Bicicleta


//Con require_once se incluye el archivo especificado, en este caso DataSource.php y 
//Bicicleta.php
require_once ("DataSource.php");
require_once (__DIR__."/../entity/Bicicleta.php");
require_once (__DIR__."/../../controller/mdb/mdbImagenesBici.php");

class BicicletaDAO {


    public function guardarBicicleta(Bicicleta $bicicleta){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO bicicleta VALUES (NULL,:tipoBicicleta,:modelo,:talla,:peso,:precio,:marca,:descripcion, :tamRueda)"; 
        
        $ultimoIdInsertado = $data_source->ejecutarActualizacion($stmt1, array(
            ':tipoBicicleta' => $bicicleta->getTipo(),
            ':modelo' => $bicicleta->getModelo(),
            ':talla' => $bicicleta->getTalla(),
            ':peso'=> $bicicleta->getPeso(),
            ':precio'=> $bicicleta->getPrecio(),
            ':marca'=> $bicicleta->getMarca(),
            ':descripcion'=> $bicicleta->getDescripcion(),
            ':tamRueda'=> $bicicleta->getTamRueda()
            )
        ); 
        
        return $ultimoIdInsertado;
    }

    public function verBicicletasPorTipo($Tipo){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT t1.id, t1.modelo, t1.talla, t1.peso, t1.precio, t1.marca, t1.descripcion, t1.tamRueda, t2.nombre FROM bicicleta AS t1 INNER JOIN tipobicicleta AS t2 ON t1.tipoBicicleta=t2.id  WHERE t1.tipoBicicleta=:tipoBicicleta", array(":tipoBicicleta"=>$Tipo));

        $bicicleta=null;
        $bicicletas=array();

        foreach($data_table as $indice => $valor){
            $bicicleta = new Bicicleta(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"], 
                    $data_table[$indice]["modelo"],
                    $data_table[$indice]["talla"],
                    $data_table[$indice]["peso"],
                    $data_table[$indice]["precio"],
                    $data_table[$indice]["marca"],
                    $data_table[$indice]["descripcion"],
                    $data_table[$indice]["tamRueda"]
                    );
            $bicicleta->setImagenes(verImagenesBicicletasPorId($bicicleta->getIdBicicleta()));
            array_push($bicicletas,$bicicleta);
        }

        
        return $bicicletas;
    }
}