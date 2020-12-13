<?php
require_once(__DIR__."/../../model/dao/HorarioRutaDAO.php");

function verhorariosPorIdRuta($idRuta){

    $horario = new HorarioRutaDAO();

    $horarios = $horario->verhorariosPorIdRuta($idRuta);

    return $horarios;
}