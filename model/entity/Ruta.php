<?php

    class Ruta
    {
        public $id;
        public $nombre;
        public $origen;
        public $destino;
        public $descripcion;
        public $iframeMapa;
        public $tiempoEstimado;


        public function __construct($id, $nombre, $origen, $destino, $descripcion, $iframeMapa, $tiempoEstimado){

            $this->id = $id;
            $this->nombre = $nombre;
            $this->origen = $origen;
            $this->destino = $destino;
            $this->descripcion = $descripcion;
            $this->iframeMapa = $iframeMapa;
            $this->tiempoEstimado = $tiempoEstimado;
        }

        public function getIdorigen(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }
    
        public function getOrigen(){
            return $this->origen;
        }
    
        public function getDestino(){
            return $this->destino;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getIframeMapa(){
            return $this->iframeMapa;
        }

        public function getTiempoEstimado(){
            return $this->tiempoEstimado;
        }
    }
?>