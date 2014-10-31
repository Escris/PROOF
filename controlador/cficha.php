<?php
include ("/modelo/mficha.php");
include ("/modelo/mpagina.php");
	$ins = new mficha();
	
	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->delfic($del);
	}
	$pac=106;
	$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$codval= isset($_POST["codval"]) ? $_POST["codval"]:NULL;
	$nomval= isset($_POST["nomval"]) ? $_POST["nomval"]:NULL;
	$codpar= isset($_POST["codpar"]) ? $_POST["codpar"]:NULL;
	$codpro= isset($_POST["codpro"]) ? $_POST["codpro"]:NULL;
	$nompro= isset($_POST["nompro"]) ? $_POST["nompro"]:NULL;
	$nfic= isset($_POST["nfic"]) ? $_POST["nfic"]:NULL;
	$finific= isset($_POST["finific"]) ? $_POST["finific"]:NULL;
	$ffinfic= isset($_POST["ffinfic"]) ? $_POST["ffinfic"]:NULL;
	$jorfic = isset($_POST["jorfic"]) ? $_POST["jorfic"]:NULL;
	$ofefic = isset($_POST["ofefic"]) ? $_POST["ofefic"]:NULL;
	$modfic = isset($_POST["modfic"]) ? $_POST["modfic"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$dat6=$ins->Selfic1($pr);
	$dat2 = $ins->selpara(4);
	$dat3 = $ins->selpara(5);
	$dat4 = $ins->selpara(6);
	$dat1 = $ins->selfic2();
	
	if ($nfic && $finific && $ffinfic && $jorfic && $ofefic && $codpro && $modfic && $actu){
		$ins->updfic($nfic, $finific, $ffinfic, $jorfic, $ofefic, $codpro,$modfic);
	}
	
	
 if ($nfic && $finific && $ffinfic && $jorfic && $ofefic && $codpro && $modfic && !$actu){
		$ins->insfic($nfic, $finific, $ffinfic, $jorfic, $ofefic, $codpro,$modfic);
	}
	
		//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(ficha.nfic) as Npe FROM ficha INNER JOIN programa ON ficha.codpro = programa.codpro";
	if($filtro) $conp.= " WHERE ficha.nfic LIKE '%".$filtro."%'";
	
	$dat5=$ins->selfic3();
		
	
?>