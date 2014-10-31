<?php

include ("../controlador/conexion.php");
	date_default_timezone_set('America/Bogota');
    $hoy = strftime("%Y-%m-%d");
	$valor = $_REQUEST["variables"];
	if ($valor==0) {
    
    }else{
	$sql2 = "SELECT ficha.nfic, ficha.codpro AS ficha, ficha.ffinfic, programa.codpro , programa.nompro FROM ficha INNER JOIN programa ON ficha.codpro=programa.codpro WHERE ficha.codpro=".$valor." order by ficha.nfic, programa.nompro";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$estados = $conexionBD->ejeCon($sql2,0);
	$result=array();
	$j=0;
	for($j=0; $j < count($estados); $j++){
		if ($hoy < $estados[$j]['ffinfic']) {
			$result[$j]["value"]=$estados[$j]["nfic"];
			$result[$j]["nombre"]=$estados[$j]["nfic"];
		}else{
			
		}
		
	}		   
	$div='<div align="left">Numero de la Ficha:</div>';
	$html='<select name="nfic" id="id_estado" style="width: 195px;">';
	$html.='<option value="0"  >Seleccione</option>';
	foreach($result as $res){
			$html.='<option value="'.$res["value"].'">'.$res["nombre"].'</option>';
		}
	$html.='</select>';
	echo $div;
	echo $html;
	}
?>

