<?php
	include ("/controlador/cregistrov.php");
?>

<center>
<h1>ENCUESTAS FINALIZADAS</h1>
 <form name="form2" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
      <div align="center">
        <table width="550" border="1" cellspacing="0" cellpadding="4">
          <tr>
            <td class="style1" align="center" width="80">Cod. Encuesta<input name="pac" type="hidden" id="pac" value="108"/></td>
              <td class="style1" align="center">Fecha Inicio</td>
              <td class="style1" align="center">Fecha Fin</td>
              <td class="style1" align="center">Ver encuesta</td>
          </tr>
          <?php 
  //Select
    $datt = $ins->selenc1();
    for ($i=0; $i < count($datt); $i++){
    ?>   
         <tr>
             <td class="style2" align="center"><?php echo $datt[$i]['noenc'] ?></td>
             <td class="style2" align="center"><?php echo $datt[$i]['fecinienc']  ?></td>
             <td class="style2" align="center"><?php echo $datt[$i]['fecfinenc'] ?></td>
             <td align="center"><a href="home.php?pr=<?php echo $datt[$i]['noenc'] ?>&pac=109&up=11"><img border=0 src="image/ver.png" width="16" height="16" /></a></td>
           </tr>  
              <?php  }  ?>
           <tr>
        <td colspan=6 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
           </tr>
         </table>
         <p>&nbsp; </p>
         </div>
    </form>
</center>

