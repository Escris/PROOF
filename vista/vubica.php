<?php

include ("../controlador/conexion.php");
    $valor = $_REQUEST["valor"];
	if($valor==0){
	}else{
    $sql2 = "SELECT ubicacion.codubi, ubicacion.nomubi AS ubiciu, vieubica.nomubi AS ubidep FROM ubicacion INNER JOIN vieubica ON ubicacion.depubi=vieubica.codubi WHERE ubicacion.depubi=".$valor." order by vieubica.nomubi, ubicacion.nomubi";
	//echo $sql2;
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$estados = $conexionBD->ejeCon($sql2,0);
	$result=array();
	$i=0;
	foreach($estados as $estado){
		$result[$i]["value"]=$estado["codubi"];
		$result[$i]["nombre"]=$estado["ubiciu"];
		$i++;
		}
	$div='Ciudad<br/>';   
	$html='<select name="codubi" id="id_estado" style="width: 195px;">';
	$html.='<option value="">Seleccione</option>';
	foreach($result as $res){
			$html.='<option value="'.$res["value"].'">'.$res["nombre"].'</option>';
		}
	$html.='</select>';
	echo $div;
	echo $html;
	}
?>