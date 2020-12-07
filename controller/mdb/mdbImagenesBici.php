<?php
require_once(__DIR__."/../../model/dao/ImagenesBiciDAO.php");

function verImagenesBicicletasPorId($Id){

    $imagenbicicleta = new ImagenesBiciDAO();

    $imagenesbicicletas = $imagenbicicleta->verImagenesBicicletasPorId($Id);

    return $imagenesbicicletas;
}