<?php
include ("/modelo/mregistrov.php");
	$ins = new mregistrov();

    $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($del){
      $ins->delenc($del);
    }

    $noenc = isset($_POST["noenc"]) ? $_POST["noenc"]:NULL;
    $fecinienc = isset($_POST["fecinienc"]) ? $_POST["fecinienc"]:NULL;
    $fecfinenc = isset($_POST["fecfinenc"]) ? $_POST["fecfinenc"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

    if($noenc && $fecinienc && $fecfinenc && $actu){
        $ins->updenc($noenc , $fecinienc , $fecfinenc);
    }

    if($fecinienc && $fecfinenc && !$actu){
        $ins->insenc($fecinienc , $fecfinenc);
    }

    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    //$dat = $ins->selenc1($pr);
?>