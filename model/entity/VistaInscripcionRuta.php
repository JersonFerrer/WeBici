<?php

    class VistaInscripcionRuta{
        public $id;
        public $fecha;
        public $origen;
        public $destino;
        public $horaSalida;
        public $tiempoEstimado;
        public $estado;


        public function __construct($id, $fecha, $origen, $destino, $horaSalida, $tiempoEstimado ,$estado){

            $this->id = $id;
            $this->fecha = $fecha;
            $this->origen = $origen;
            $this->destino = $destino;
            $this->horaSalida = $horaSalida;
            $this->tiempoEstimado = $tiempoEstimado;
            $this->estado = $estado;
        }

        public function getIdInscripcion(){
            return $this->id;
        }

        public function getFecha(){
            return $this->fecha;
        }
    
        public function getOrigen(){
            return $this->origen;
        }
        public function getDestino(){
            return $this->destino;
        }
        public function getHoraSalida(){
            return $this->horaSalida;
        }
        public function getTiempoEstimado(){
            return $this->tiempoEstimado;
        }
    
        public function getEstado(){
            return $this->estado;
        }
    }
?>