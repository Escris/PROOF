<?php 
    include ("controlador/cencuesta.php");
?>
<center>
	<form name="form1" action="home.php?pac=108" method="post">
		<table width= "400">
			<tr> 
				  <td colspan="2" align="center">
					<h1>Editar Encuesta</h1>
			    </td>
			</tr>
      <tr>
      <td><input type="hidden"<?php echo $dat[0]['noenc'] ?>/>
          <input type="hidden" name="noenc" value="<?php echo $dat[0]['noenc']?>" />
          <input type="hidden" name="actu" value="actu" />
      </td>
      </tr>
      <tr> 
				<td align="left">Nombre Encuesta</td>
				<td><input type="text" name="nombre" requiered="required" value="<?php echo $dat[0]['nombre']?>" /></td>
			</tr>
      
			<tr> 
				<td align="left">Fecha Inicio De Encuesta</td>
				<td><input type="date" name="fecinienc" requiered="required" value="<?php echo $dat[0]['fecinienc']?>" />
            <input name="pac" type="hidden" id="pac" value="108"/></td>

			</tr>
			<tr>
				<td align="left">Fecha Final De Encuesta</td>
				<td><input type="date" name="fecfinenc" required="required" value="<?php echo $dat[0]['fecfinenc']?>" />
            <input name="pac" type="hidden" id="pac" value="108"/></td>
		  </tr>
		  <tr>
		  </tr>
		  <tr> 
		    <td colspan="2" align="center">
		    <input id="boton1" type="submit" value="Guardar"/></td>
		  </tr>
		</table>
  </form>

  <form name="form2" name="form2" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
    <div align="center">
    	<table width="550" border="1" cellspacing="0" cellpadding="4">
    	  <tr>
    	    <td class="style1" align="center" width="80">Cod. Encuesta<input name="pac" type="hidden" id="pac" value="108"/></td>
          <td class="style1" align="center">Fecha Inicio</td>
          <td class="style1" align="center">Fecha Fin</td>
    	  </tr>
    	    <?php 
 	//Select
		$dat = $ins->selenc();
		for ($i=0; $i < count($dat); $i++){
	  ?>   

	      <tr>
           <td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['noenc'] ?>></td>
           <td class="style2" align="center"><?php echo $dat[$i]['fecinienc']  ?></td>
           <td class="style2" align="center"><?php echo $dat[$i]['fecfinenc'] ?></td>
        </tr>
        <?php  }  ?>
        <tr>
           <td colspan=3 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
      </table>
        <p>&nbsp; </p>
      </div>
   </form>
</center>
