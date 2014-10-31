<?php 
    include ("modelo/mencuesta.php");
    $ins = new mencuesta();

    $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($del){
      $ins->delenc($del);
    }
	$est = isset($_GET["est"]) ? $_GET["est"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $noenc = isset($_POST["noenc"]) ? $_POST["noenc"]:NULL;
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"]:NULL;
    $fecinienc = isset($_POST["fecinienc"]) ? $_POST["fecinienc"]:NULL;
    $fecfinenc = isset($_POST["fecfinenc"]) ? $_POST["fecfinenc"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
	if($est==1){
		$ins->updest($pr, 0);
	}else if($est==0){
		$ins->updest($pr, 1);
	}

    if($noenc && $fecinienc && $fecfinenc && $actu && $nombre){
    	$ins->updenc($noenc , $fecinienc , $fecfinenc,$nombre);
    }

    if($fecinienc && $fecfinenc && !$actu && $nombre){
    	$ins->insenc($fecinienc , $fecfinenc,$nombre);
    }

    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $dat = $ins->selenc1($pr);
?>