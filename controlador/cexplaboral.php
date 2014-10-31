<?php
	include ("modelo/mexplaboral.php");
	$ins = new mexplaboral();

	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->delexp($del);
	}

	$codexplaboral = isset($_POST["codexplaboral"]) ? $_POST["codexplaboral"]:NULL;
    $ndocapre= isset($_POST["ndocapre"]) ? $_POST["ndocapre"]:NULL;
	$nomempre = isset($_POST["nomempre"]) ? $_POST["nomempre"]:NULL;
	$cargo = isset($_POST["cargo"]) ? $_POST["cargo"]:NULL;
	$direccion = isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
	$telefono = isset($_POST["telefono"]) ? $_POST["telefono"]:NULL;
	$ingreso = isset($_POST["ingreso"]) ? $_POST["ingreso"]:NULL;
	$retiro = isset($_POST["retiro"]) ? $_POST["retiro"]:NULL;
	$motivo = isset($_POST["motivo"]) ? $_POST["motivo"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
	//Actualizar
	if ($codexplaboral && $ndocapre && $nomempre && $cargo && $direccion && $telefono && $ingreso && $retiro && $motivo && $actu){
		$ins->updexp($codexplaboral, $ndocapre, $nomempre, $cargo, $direccion, $telefono, $ingreso, $retiro, $motivo);
	}
	//Insertar
	if ($ndocapre && $nomempre && $cargo&& $direccion && $telefono && $ingreso && $retiro && $motivo &&!$actu){
		$ins->insexp($ndocapre, $nomempre, $cargo, $direccion, $telefono, $ingreso, $retiro, $motivo);
	}

	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $dat = $ins->selexp1($pr);
?>