<?php
require_once(__DIR__."/../../model/dao/inscripcionRutaDAO.php");

function guardarInscripcionRuta(InscripcionRuta $inscripcion){

    $dao=new InscripcionRutaDAO();

    $inscripcion = $dao->guardarInscripcion($inscripcion);

    return $inscripcion;
}

function consultarInscripcionesPorIdUsuario($idUsuario){

    $dao = new InscripcionRutaDAO();

    $inscripciones = $dao->consultarInscripcionesPorIdUsuario($idUsuario);

    return $inscripciones;
}