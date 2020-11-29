<?php

    class TipoBicicleta
    {
        public $id;
        public $nombre;
        public $descripcion;

        public function __construct($id, $nombre, $descripcion){

            $this->id = $id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
        }

        public function getIdTipo(){
            return $this->id;
        }

        public function getNombre(){
            return $this->idBicicleta;
        }
        
        public function getDescripcion(){
            return $this->descripcion;
        }
    }
?>