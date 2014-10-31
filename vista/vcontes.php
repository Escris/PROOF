<?php 
    include ("controlador/ccontes.php");
	include ("modelo/mencuesta.php");
?>
<center>

    <form name="form1" action="" method="GET" >
    	<div align="center">
        
        <h5>ENCUESTAS POR PRESENTAR</h5>
        
        <h4> Escoja la encuesta que desea presentar</h4>
        </br></br> </br></br>
    		<table width="550" border="1" cellspacing="0" cellpadding="4">
            	
    	    <tr>
    	      <td class="style1" align="center" width="80">No. Encuesta<input name="pac" type="hidden" id="pac" value="109"/></td>
              <td class="style1" align="center">Nombre Encuesta</td>
              <td class="style1" align="center">Fecha Inicio</td>
              <td class="style1" align="center">Fecha Final</td>
              <td class="style1" align="center">Presentar</td>
             
    	    </tr>
    	    <?php
			date_default_timezone_set('America/Bogota');
			$hoy = strftime("%Y-%m-%d");
 	//Select
		$j = 0; 
		for ($i=0; $i < count($dat); $i++){
			if($dat[$i]['Estado']==true && $dat[$i]['fecinienc']<=$hoy && $dat[$i]['fecfinenc']>=$hoy){
				if($dat[$i]['b']==NULL){
				?>    
	       <tr>
             
             <td class="style2" align="center"><?php echo $dat[$i]['noenc'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['nombre'] ?></td> 
             <td class="style2" align="center"><?php echo $dat[$i]['fecinienc'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['fecfinenc'] ?></td>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['noenc'] ?>&pac=109&up=11"><img border=0 src="image/editar.png" width="16" height="16"/></a></td>
           
           </tr>  
              <?php 
		//}
			//}
				}else{
					$j++;
					
				}
				}
		}
		if($j==count($dat)){echo "<tr><td colspan='5' align='center'><strong>No hay Encuestas Disponibles</strong></td></tr>";}
		?>
          
         </table>
         <p>&nbsp; </p>
         </div>
    </form>
</center>