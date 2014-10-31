<?php
    include ("modelo/mestadi.php");
	include ("vista/GoogChart.class.php");
    $ins = new mestadi();
	
	$codpre = isset($_GET["codpre"]) ? $_GET["codpre"]:NULL;
	$encuesta = isset($_GET["encuesta"]) ? $_GET["encuesta"]:NULL;


	
	$chart = new GoogChart();

	// Set graph colors
$color = array(
			'#FF8000',
			'#54C7C5',
			'#000080',
		);

	$datospre = $ins->seltipopre($codpre);
	$datosres = $ins->selres($codpre);
	$nomenc = $ins->selenc($encuesta);
		  
	$respuestas=$ins->selecRespuestas($codpre);
	$temp=array();
	$j=0;
	$grafica=array();
	$graficapor=array();
	$cantidad=0;
	if(!is_null($respuestas))
	{
		foreach($respuestas as $respuesta)
		{
			if($datospre[0]["tppre"]==11){
				$multiple=explode(',',$respuesta["respuesta"]);
				
				foreach($multiple as $m){
					if($m!=""){
						if(array_key_exists ($m,$grafica)){
							
							$grafica[$m]++;
							
						}else{
							$grafica[$m]=1;
								
						}
						$cantidad++;
	
					}
				}
				
				
			}else{
				$grafica[$respuesta["respuesta"]]=($respuesta["cant"]/$respuesta["total"])*100;
				$graficapor[$respuesta["respuesta"]]=($respuesta["cant"]/$respuesta["total"])*100;
				//$graficapor[$j]["campo"]=$respuesta["respuesta"];
			}
		}
		if($datospre[0]["tppre"]==11){
		
		foreach($grafica as $graf => $value){		
			$graficapor[$graf]=($value/$cantidad)*100;
			//$graficapor[$k]["campo"]=$graf
		}
		}
	}
			
	
	//num es el numero de pagina, y este procedimiento es para hacer un select con un LIMIT//	
	
	$registros = 10;
	$num = isset($_GET["num"]) ? $_GET["num"]:NULL;
	if(is_numeric($num))
	{
	   $inicio = (($num-1)*$registros);
	}
	else
	{
	   $inicio = 0;   
	}
	$abierta = $ins->pregabi($encuesta, $codpre, $inicio, $registros);
	  
	//Este procedimiento es para para poder sacar el numero de paginas nescesarias para los link, segun el numero de registros total y la cantidad de registros que se debe mostrar por pagina//  
	$regis = $ins->abitot($encuesta, $codpre); 
	$numregis = count($regis); 
	$paginas = ceil($numregis/$registros);
?>