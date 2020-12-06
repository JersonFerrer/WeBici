<?php

    class Bicicleta
    {
        public $id;
        public $tipo;
        public $modelo;
        public $talla;
        public $peso;
        public $precio;
        public $marca;
        public $descripcion;
        public $tamRueda;
        public $imagenes = array();

        public function __construct($id, $tipo, $modelo, $talla, $peso, $precio, $marca, $descripcion, $tamRueda){

            $this->id = $id;
            $this->tipo = $tipo;
            $this->modelo = $modelo;
            $this->talla = $talla;
            $this->peso = $peso;
            $this->precio = $precio;
            $this->marca = $marca;
            $this->descripcion = $descripcion;
            $this->tamRueda = $tamRueda;
        }

        public function getIdBicicleta(){
            return $this->id;
        }
    
        public function getTipo(){
            return $this->tipo;
        }
    
        public function getModelo(){
            return $this->modelo;
        }
    
        public function getTalla(){
            return $this->talla;
        }
    
        public function getPeso(){
            return $this->peso;
        }
        
         public function getPrecio(){
            return $this->precio;
        }
    
         public function getMarca(){
            return $this->marca;
        }
    
        public function getDescripcion(){
            return $this->descripcion;
        }
    
        public function getTamRueda(){
            return $this->tamRueda;
        }

        public function getImagenes(){
            return $this->imagenes;
        }

        public function setImagenes($imagenes){
            $this->imagenes = $imagenes;
            //array_push($this->imagenes,$imagenes);
        }
    }
?>