<?php 
    include ("controlador/cencuestav.php");
?>
<center>

    <form name="form1" action="" method="GET" >
    	<div align="center">
               
    		<table width="550" cellspacing="0" cellpadding="4">
            	
    	    <tr>
    	      <td class="style1" align="center" width="80"><h1>Encuesta No: <?php echo $dat[0]['noenc'] ?></h1></td>
            </tr>
            <tr>
              <td class="style1" align="center">Fecha Inicio: <?php echo $dat[0]['fecinienc']  ?></td>
            </tr>
            <tr>
              <td class="style1" align="center">Fecha Fin: <?php echo $dat[0]['fecinienc']  ?></td>
            </tr>
                   
         </table>
         <p>&nbsp; </p>
         </div>
    </form>
</center>
<form id="form3" name="form3" method="get" action="home.php?pac=109">
	

	<table width="480">
	<?php 
	//Select
	$dat = $ins->selpre();
	$dat2 = $ins->selpre3();
	?>
	<?php
		for ($j=0; $j < count($dat); $j++){
	
	?>	
	<tr>
		<td class="style2" align="left" ><h2><?php echo ($j+1)."." ;?></h2></td>
		<td class="style2" align="left"  ><h2><?php echo $dat[$j]['despre'] ?></h2></td> 
		</tr>
		<?php
			$a=1;
			for ($i=0; $i < count($dat2); $i++){
				
			if(($dat[$j]['codpre'])==$dat2[$i]['codpre']){
		?>
	
		<tr>
		<td colspan="2" class="style2" align="center">&nbsp;</td>
        </tr>
        <tr>
		<td  colspan="2" class="style2" align="left"><input type="radio"><?php echo $dat2[$i]['res'] ?></td>
<?php 
		}
		} 
		?>
	</tr>
	<?php } ?>
    <p>&nbsp; </p>
	<tr>
    	   <td colspan="2"><center> <input type="submit" name:"Volver" value="Volver"/> </center></td>
    </tr> 
	</table>
    </form>

