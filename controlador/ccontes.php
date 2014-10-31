<?php

include ("modelo/mcontes.php");
$ins = new mencuestav();
$ndocusu = isset($_SESSION["idUser"]) ? $_SESSION["idUser"] : NULL;
$usrr = isset($_SESSION["user"]) ? $_SESSION["user"] : NULL;
$del = isset($_GET["del"]) ? $_GET["del"] : NULL;
if ($del) {
    $ins->delenc($del);
}

$noenc = isset($_POST["noenc"]) ? $_POST["noenc"] : NULL;
$fecinienc = isset($_POST["fecinienc"]) ? $_POST["fecinienc"] : NULL;
$fecfinenc = isset($_POST["fecfinenc"]) ? $_POST["fecfinenc"] : NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"] : NULL;
$tpre = isset($_POST["tpre"]) ? $_POST["tpre"] : NULL;

if ($noenc && $fecinienc && $fecfinenc && $actu) {
    $ins->updenc($noenc, $fecinienc, $fecfinenc);
}

if ($fecinienc && $fecfinenc && !$actu) {
    $ins->insenc($fecinienc, $fecfinenc);
}

$pr = isset($_GET["pr"]) ? $_GET["pr"] : NULL;
$ficha = $ins->selapre($ndocusu);
$pro = $ins->selprog();
$dat2 = $ins->selpre3();
$dat3 = $ins->selenc();
$dat = $ins->selenc2($ndocusu);
?>