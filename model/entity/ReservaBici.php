<?php

    class ReservaBici
    {
        public $id;
        public $fecha;
        public $horasContratadas;
        public $horaEntrega;
        public $horaDevolucion;
        public $idUsuario;
        public $idBicicleta;
        public $estado;
        

        public function __construct($id, $fecha, $horasContratadas, $horaEntrega, $horaDevolucion, $idUsuario, $idBicicleta, $estado){

            $this->id = $id;
            $this->fecha = $fecha;
            $this->horasContratadas = $horasContratadas;
            $this->horaEntrega = $horaEntrega;
            $this->horaDevolucion = $horaDevolucion;
            $this->idUsuario = $idUsuario;
            $this->idBicicleta = $idBicicleta;
            $this->estado = $estado;
        }

        public function getIdReserva(){
            return $this->id;
        }

        public function getFecha(){
            return $this->fecha;
        }
    
        public function getHorasContratadas(){
            return $this->horasContratadas;
        }
    
        public function getHoraEntrega(){
            return $this->horaEntrega;
        }

        public function getHoraDevolucion(){
            return $this->horaDevolucion;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }

        public function getIdBicicleta(){
            return $this->idBicicleta;
        }
    }
?>