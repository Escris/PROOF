<?php
    include ("modelo/mcontra.php");
    $ins = new mcontra();
	$nodoc = isset($_POST["ndocapre"]) ? $_POST["ndocapre"]:NULL;
	if ($nodoc){
		$datos = $ins->selcon($nodoc);
	}else{
		$datos = isset($datos) ? $datos:NULL;
	}
?>