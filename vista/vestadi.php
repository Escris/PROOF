<?php 
	include("controlador/cestadi.php");
?>
<script language="javascript" src="js/jquery-1.9.1.js"></script><!-- llamamos al JQuery-->
<script language="javascript">
	function RecargarEncuestas(value){
		//document.write(value);
		var parametros = {
                "valor" : value
        };
		
        $.ajax({
                data:  parametros,
                url:   'vista/miscript2.php',
                type:  'post',
                success:  function (response) {
                        $("#reloadPregunta").html(response);
                }
        });
     }
	 function F()
	 {
		var posicion=document.getElementById('id_estado').options.selectedIndex; //posicion
		alert(document.getElementById('id_estado').options[posicion].text); //valor
		alert(posicion);
	 }
</script>
<center>
<form id="Form1" name="Form1" action="" method="GET" >	
<div>
<table width="700" border="0">
	<tr>
    	<td align="center" colspan="2"><h2>Graficas Encuestas</h2></td>
    </tr>
    <tr>
        <td align="center">	
        <input name="pac" type="hidden" id="pac" value="111" />
        <div>
   		<select name="encuesta" onchange="javascript:RecargarEncuestas(this.value);">
       	<option value="0"> Seleccione la encuesta</option>
        <?php
           include("controlador\conexion_sqlserver.php");
           $sql = "SELECT noenc, nombre FROM encuesta";
           echo $sql;
           $conexionBD = new conexion_sqlserver();
                $conexionBD->conectarBD();
                $data = $conexionBD->ejecutarConsulta($sql,0); 
           for ($i=0;$i<count($data);$i++){
        ?>
       	<option value="<?php echo $data[$i]['noenc'] ?>"><?php echo $data[$i]['nombre'] ?></option>
        <?php }?>
   		</select>
        <br />
        <br />
        <div id="reloadPregunta">
       		<select name="codpre" id="id_estado">
       			<option value="0"> Seleccione la pregunta</option>
       		</select>
       	</div>
        <br />
       	<!--<input type="button" value="Graficar" onclick="javascript:F();"/>-->
        <br />
       	<input type="submit" value="Graficar" name="Graficar"/>
   </div>
         </td>
         </tr>
         </table>
</form>
</div>

<div align="center" id="tabint">

<?php

if($codpre)
{
	if($respuestas)
	{
		echo "<table border='1' width='550'>";		
		if($datospre[0]["tppre"]==13)
		{
			echo "<tr><th>Encuesta: ".$nomenc[0]['nombre']."</th></tr>";
			echo "<th>Respuestas de ".$datospre[0]['despre']."</th>";
			
			
			foreach($respuestas as $respuesta)
			{
				echo "<tr>";
				//var_dump($respuesta);
				echo "<td>".$respuesta["respuesta"]."</td>";
				echo "</tr>";
				//echo round($itemvalue,2)." </br>";
			}
			
		}
		else
		{
			echo "<tr><th>Encuesta: ".$nomenc[0]['nombre']."</th></tr>";
			echo "<th>Respuestas de ".$datospre[0]['despre']."</th>";
			$chart->setChartAttrs( array(
				'type' => 'p3',
				'title' => $datospre[0]['despre'],
				'data' => $grafica,
				'size' => array(650,300),
				'color' => $color,
				'labelsXY' => true,
			));
			echo "<tr> <td>";
			// Print chart
			echo "<center>".$chart."</center>";
		    echo "</tr> </td>";
			echo "<tr><th align='center'>RESULTADOS</th></tr>";
			echo "<tr> <th align='center'>";
			foreach($graficapor as $item => $itemvalue)
			{
				echo $item.": ";
				echo round($itemvalue,2)."% </br>";
			}
			echo "</th> </tr>";
		}
	}
	else
	{
		echo "<h2>No hay datos para graficar esta pregunta</h2>";
	}
}

?>
</table>
</div>