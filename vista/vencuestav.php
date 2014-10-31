<?php 
    include ("controlador/cencuestav.php");
?>
<center>

    <form name="form1" action="" method="GET" >
    	<div align="center">
        
        <h2> VER ENCUESTA</h2>
        
        <h3> Escoja la encuesta que desea ver</h3>
        
    		<table width="550" border="1" cellspacing="0" cellpadding="4">
            	
    	    <tr>
    	      <td class="style1" align="center" width="80">Cod. Encuesta<input name="pac" type="hidden" id="pac" value="109"/></td>
              <td class="style1" align="center">Fecha Inicio</td>
              <td class="style1" align="center">Fecha Fin</td>
              <td class="style1" align="center">Ver</td>
             
    	    </tr>
    	    <?php 
 	//Select
		$dat = $ins->selenc();
		for ($i=0; $i < count($dat); $i++){
	  ?>   
	       <tr>
             <td class="style2" align="center"><?php echo $dat[$i]['noenc'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['fecinienc']  ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['fecfinenc'] ?></td>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['noenc'] ?>&pac=109&up=11"><img border=0 src="image/ver.png" width="16" height="16" /></a></td>
           
           </tr>  
              <?php  }  ?>
          
         </table>
         <p>&nbsp; </p>
         </div>
    </form>
</center>


