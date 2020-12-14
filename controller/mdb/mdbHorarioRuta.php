<?php
require_once(__DIR__."/../../model/dao/HorarioRutaDAO.php");

function verhorariosPorIdRuta($idRuta){

    $horario = new HorarioRutaDAO();

    $horarios = $horario->verhorariosPorIdRuta($idRuta);

    return $horarios;
}
 function verhorariosPorIdInscripcion($idHorarioRuta){

    $horario = new HorarioRutaDAO();

    $horarios = $horario->verhorariosPorIdInscripcion($idHorarioRuta);

    return $horarios;

 }