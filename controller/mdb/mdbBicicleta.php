<?php
require_once(__DIR__."/../../model/dao/BicicletaDAO.php");

function verBicicletas(){

    $bicicleta = new BicicletaDAO();

    $bicicletas = $bicicleta->verBicicletas();

    return $bicicletas;
}