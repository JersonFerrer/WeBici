<?php
require_once(__DIR__."/../../model/dao/BicicletaDAO.php");

function verBicicletasPorTipo($tipo){

    $bicicleta = new BicicletaDAO();

    $bicicletas = $bicicleta->verBicicletasPorTipo($tipo);

    return $bicicletas;
}