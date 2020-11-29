<?php

    class ImagenesBicicleta
    {
        public $id;
        public $idBicicleta;
        public $imagen;
        public $descripcion;

        public function __construct($id, $idBicicleta, $imagen, $descripcion){

            $this->id = $id;
            $this->idBicicleta = $idBicicleta;
            $this->imagen = $imagen;
            $this->descripcion = $descripcion;
        }

        public function getIdImagen(){
            return $this->id;
        }

        public function getIdBicicleta(){
            return $this->idBicicleta;
        }
    
        public function getImagen(){
            return $this->imagen;
        }
    
        public function getDescripcion(){
            return $this->descripcion;
        }
    }
?>