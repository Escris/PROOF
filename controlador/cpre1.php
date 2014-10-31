<?php

include ("modelo/mpre.php");
include ("modelo/mencuesta.php");

$obj_encuesta = new mencuesta();
$obj_pregunta = new mpre();
$cod_encuesta = ISSET($_GET["cod_encuesta"]) ? $_GET["cod_encuesta"] : NULL;
$cod_pregunta = ISSET($_GET["pr"]) ? $_GET["pr"] : NULL;
$is_edit = ISSET($_GET["editar"]) ? $_GET["editar"] : NULL;
$is_delete = ISSET($_GET["eliminar"]) ? $_GET["eliminar"] : NULL;
$encuesta = $obj_encuesta->selenc1($cod_encuesta);
$pregunta = $obj_pregunta->seleccionarPregunta($cod_pregunta);
$temp = $pregunta[0]["despre"];
$tipos_pregunta = $obj_pregunta->seltpre();
if (!is_null($is_edit)) {
    $cant_respuestas = isset($_GET["canrespre"]) ? $_GET["canrespre"] : NULL;
    $despre = isset($_GET["despre"]) ? $_GET["despre"] : NULL;
    $tppre = isset($_GET["tppre"]) ? $_GET["tppre"] : NULL;
    if ($cod_pregunta && $despre && $tppre && $cant_respuestas && $cod_encuesta) {
        $obj_pregunta->updpre($cod_pregunta, $despre, $tppre, $cant_respuestas, $cod_encuesta);
        $pregunta = $obj_pregunta->seleccionarPregunta($cod_pregunta);
        //echo '<script>alert("Se actualizo correctamente");</script>';
        header('Location: home.php?pac=115&pr='.$cod_encuesta);
    }

}
if (!is_null($is_delete)) {
        $obj_pregunta->delpre($cod_pregunta);
        header('Location: home.php?pac=115&pr='.$cod_encuesta);
    

}
?>