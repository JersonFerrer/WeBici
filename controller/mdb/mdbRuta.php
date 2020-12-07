<?php
require_once(__DIR__."/../../model/dao/RutaDAO.php");

function verRutas(){

    $ruta = new RutaDAO();

    $rutas = $ruta->verRutas();

    return $rutas;
}