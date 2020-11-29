<?php

    class HorarioRuta
    {
        public $id;
        public $fecha;
        public $horaSalida;
        public $idRuta;

        public function __construct($id, $fecha, $horaSalida, $idRuta){

            $this->id = $id;
            $this->fecha = $fecha;
            $this->horaSalida = $horaSalida;
            $this->idRuta = $idRuta;
        }

        public function getIdHorarioRuta(){
            return $this->id;
        }

        public function getFecha(){
            return $this->fecha;
        }
    
        public function getHoraSalida(){
            return $this->horaSalida;
        }
    
        public function getIdRuta(){
            return $this->idRuta;
        }
    }
?>