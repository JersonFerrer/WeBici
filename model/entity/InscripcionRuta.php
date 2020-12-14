<?php

    class InscripcionRuta
    {
        public $id;
        public $idusuario;
        public $idHorarioRuta;
        public $estado;

        public function __construct($id, $idusuario, $idHorarioRuta, $estado){

            $this->id = $id;
            $this->idusuario = $idusuario;
            $this->idHorarioRuta = $idHorarioRuta;
            $this->estado = $estado;
        }

        public function getIdInscripcion(){
            return $this->id;
        }

        public function getIdUsuario(){
            return $this->idusuario;
        }
    
        public function getIdHorarioRuta(){
            return $this->idHorarioRuta;
        }
    
        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
    }
?>