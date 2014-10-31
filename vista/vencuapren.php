<?php
	include ("modelo/mencuapren.php");
	$ins = new mencuapren();	
?>

<form name="form1" action="" method="post"  >
    	<div align="center">
        	<h1>ENCUESTAS FINALIZADAS</h1>
    		<table width="550" border="1" cellspacing="0" cellpadding="4">
    	    <tr>
    	      <td class="style1" align="center" width="80">Cod. Aprendiz</td>
              <td class="style1" align="center">Nombre y apellido</td>
              <td class="style1" align="center">programa</td>
			  <td class="style1" align="center">Ficha</td>
			  <td class="style1" align="center">Encuesta</td>
			  <td class="style1" align="center">PDF</td>

    	    </tr>
    	    <?php 
 	//Select
		$dat = $ins->selapre();
		for ($i=0; $i < count($dat); $i++){
	  ?>   
	         <tr>
             <td class="style2" align="center" style="font-size:11px; font-weight:bold"><?php echo $dat[$i]['ndocapre'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['nomapre']." ".$dat[$i]['apeapre'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['nompro'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['nfic']  ?></td>
			 <td class="style2" align="center"><?php echo $dat[$i]['nombre']  ?></td>
			   <td align="center"><a href="vista/vencuapren1.php?pr=<?php echo $dat[$i]['noenc'] ?>" target="_blank"><img border=0 src="image/pdf1.png" width="16" height="16" /></a></td>
              <?php  }  ?>
             </tr>

    		</table>
    	</div>
        
    </form>
    <center>
    </br></br></br></br>
    <form name="form2">
<a href="vista/vexcel.php?pr=128" style="font-size:12px; text-decoration:none; color:black; font-weight:bold"  target="_blank">Descargar Aprendicez Registrados<br/><br/><img src="image/excel.gif"/></a>
</form>
</center>