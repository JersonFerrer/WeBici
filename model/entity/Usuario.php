<?php

//Esta clase POJO sirve para guardar los datos de un Usuario
//Por ejemplo, un objeto creado a partir de esta clase
//tendrá guardado los datos de un usuario de la tabla Usuarios de la
//base de datos

class Usuario
{
    public $idUsuario;
    public $nroCedula;
    public $nombres;
    public $apellidos;
    public $correo;
    public $password;
    public $telefono;
    public $direccion;
    public $imagen;
    public $token;
    public $rol;
    
    public function __construct($idUsuario, $nroCedula, $nombres, $apellidos, $correo, $password, $direccion, $telefono, $rol){

        $this->idUsuario = $idUsuario;
        $this->nroCedula = $nroCedula;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
		$this->correo = $correo;
		$this->password = $password;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->rol = $rol;
    }
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function getNroCedula(){
        return $this->nroCedula;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getCorreo(){
        return $this->correo;
    }
    
     public function getPassword(){
        return $this->password;
    }

	 public function getTelefono(){
        return $this->telefono;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function getToken(){
        return $this->token;
    }
    
    public function getRol(){
        return $this->rol;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setToken($token){
        $this->token = $token;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }
}