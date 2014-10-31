<?php
	include ("modelo/mparametro.php");
	include ("modelo/mpagina.php");
	
	$ins = new mparametro();
	
	$pac=102;
	$ed = isset($_GET["ed"]) ? $_GET["ed"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$prr = isset($_GET["prr"]) ? $_GET["prr"]:NULL;
	$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	$codpar = isset($_POST["codpar"]) ? $_POST["codpar"]:NULL;
	$nompar = isset($_POST["nompar"]) ? $_POST["nompar"]:NULL;
	$codval = isset($_POST["codval"]) ? $_POST["codval"]:NULL;
	$nomval = isset($_POST["nomval"]) ? $_POST["nomval"]:NULL;
	$delpara =isset($_POST["parametro_fijo"]) ? $_POST["parametro_fijo"]:NULL;
	$delvalor =isset($_POST["valor_fijo"]) ? $_POST["valor_fijo"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
	
	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->delpar($del);
	}
	
	$del2 = isset($_GET["del2"]) ? $_GET["del2"]:NULL;
	if ($del2){
		$ins->delval($del2);
	}
	
	
	$dat5 = $ins->selpar1($pr);
	$dat3 = $ins->selpar1($prr);
	$dat4 = $ins->selval2($pr);
	
	//Actualizar
	if ($nompar && $actu){
		$ins->updpar($codpar,$nompar);
	}
	
	//Insertar
	if ($nompar  && !$actu){
		$ins->inspar($nompar,$delpara);
	}
	
	//Actualizar Valor
	if($codval && $nomval && $codpar && $actu){
		$ins->updval($codval, $nomval, $codpar);
	}
	
	//Insertar Valor
	if ($nomval && $codpar && !$actu){
		$ins->insval($codval, $nomval, $codpar,$delvalor);
	}
	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(codval)as Npe FROM valor";  
	if($filtro) $conp.= " WHERE valor.codval LIKE '%".$filtro."%'";
	
	$dat2=$ins->selval1();
?>