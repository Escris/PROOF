<?php
	include ("/modelo/mprograma.php");
	include ("modelo/mpagina.php");
	
	
	$ins = new mprograma();

	
	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->delpro($del);
	}
	$pac=105;
	$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$codpro= isset($_POST["codpro"]) ? $_POST["codpro"]:NULL;
	$verpro= isset($_POST["verpro"]) ? $_POST["verpro"]:NULL;
	$nompro= isset($_POST["nompro"]) ? $_POST["nompro"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
	$dat = $ins->selpro1($pr);

	if ($codpro && $verpro && $nompro && $actu){
		$ins->updpro($codpro , $nompro, $verpro);
	}
	
	
    if ($codpro && $verpro && $nompro &&!$actu){
		$ins->inspro($codpro , $nompro, $verpro);
	}

	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(codpro)as Npe FROM programa";  
	if($filtro) $conp.= " WHERE programa.codpro LIKE '%".$filtro."%'";
	
	$dat5=$ins->selpro();
?>