<?php
    include ("modelo/mubicacion.php");
    include ("modelo/mpagina.php");
    $ins = new mubicacion();
    
	$pac=103;
    $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$codubi = isset($_POST["codubi"]) ? $_POST["codubi"]:NULL;
	$nomubi = isset($_POST["nomubi"]) ? $_POST["nomubi"]:NULL;
	$depubi = isset($_POST["depubi"]) ? $_POST["depubi"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	//Eliminar
    if ($del){
        $ins->delubi($del);
    }
    //Insertar
    if ($codubi && $nomubi &&!$actu){
        $ins->insubi($codubi,$nomubi,$depubi);
    }
	//Actualizar
	if ($codubi && $nomubi &&$actu){
        $ins->updubi($codubi,$nomubi,$depubi);
    }
	
	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(ubicacion.codubi) as Npe FROM ubicacion LEFT JOIN vieubica ON ubicacion.depubi=vieubica.codubi";
	if($filtro) $conp.= " WHERE ubicacion.nomubi LIKE '%".$filtro."%'";
	
	$dept = $ins->seldepto();
	$ubiuno = $ins->selubi1($pr);
?>