<?php

include ("modelo/mpre.php");
include ("/modelo/mpagina.php");
$ins = new mpre();
//Eliminar
$eliminar = isset($_GET["del"]) ? $_GET["del"] : NULL;
$delete_pregunta = isset($_GET["codpre"]) ? $_GET["codpre"] : NULL;
$delete_tipo_pre = isset($_GET["tppre"]) ? $_GET["tppre"] : NULL;

$pac=115;
$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;

//$codpre,$despre,$tppre,$valor,$noenc
$codpre = isset($_POST["codpre"]) ? $_POST["codpre"] : NULL;
$despre = isset($_POST["despre"]) ? $_POST["despre"] : NULL;
$valor = isset($_POST["valor"]) ? $_POST["valor"] : NULL;
$noenc = isset($_POST["noenc"]) ? $_POST["noenc"] : NULL;
$tppre = isset($_POST["tppre"]) ? $_POST["tppre"] : NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"] : NULL;
$fecinienc = isset($_POST["fecinienc"]) ? $_POST["fecinienc"] : NULL;
$fecfinenc = isset($_POST["fecfinenc"]) ? $_POST["fecfinenc"] : NULL;
$nomenc = isset($_POST["nomenc"]) ? $_POST["nomenc"] : NULL;
$noencp = isset($_GET["pr"]) ? $_GET["pr"] : NULL;
$obli = isset($_POST["obli"]) ? $_POST["obli"] : NULL;
?>

<?php
 
if($eliminar)$ins->delpre($delete_pregunta,$delete_tipo_pre);
if ($noencp)
    $daenc = $ins->selenc($noencp);
//$preguntas=$ins->selpre($noencp);
//Actualizar
if ($despre && $valor && $noenc && $tppre && $actu) {
    $ins->updpre($codpre, $despre, $valor, $noenc, $tppre);
}
//Insertar
if ($codpre && $despre && $tppre && $canrespre && $noenc && !$actu) {
    $ins->inspre($codpre, $despre, $tppre, $canrespre, $noenc);
}
$dat1 = $ins->seltpre();


$bo = "";
$nreg = 4; //numero de registros a mostrar
$pag = new mpagina($nreg);
$conp = "SELECT count(pregunta.codpre) as Npe FROM pregunta left join encuesta on pregunta.noenc=encuesta.noenc";
if ($filtro)
    $conp.= " WHERE pregunta.noenc LIKE '%" . $filtro . "%'";
?>



