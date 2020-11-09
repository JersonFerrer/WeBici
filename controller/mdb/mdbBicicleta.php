<?php
require_once(__DIR__."/../../model/dao/BicicletaDAO.php");

function verBicicletas($tipo){

    $bicicleta = new BicicletaDAO();

    $bicicletas = $bicicleta->verBicicletas($tipo);

    return $bicicletas;
}