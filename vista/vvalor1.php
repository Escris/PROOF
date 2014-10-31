<?php
include ("controlador/cparametro.php");
?>
<center>

<form name="form3" action="home.php?pac=<?php echo $pac; ?>" method="post">
	<table width="400">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Modificar Valores</h2>
            </td>
        </tr>
    	<tr>
        	<td>Nombre del Valor</td>
        	<td><input type="text" name="nomval" size="30" maxlength="30" required="required" value="<?php echo $dat4[0]['nomval'] ?>" /></td>
			<input type="hidden" name="actu" value="actu" /><input type="hidden" name="codval" value="<?php echo $dat4[0]['codval'] ?>"/>
        	
        </tr>
            
  
        <tr>
        	<td colspan="2" align="center">
            	<input id="boton1" type="submit" value="Guardar" />
            </td>
        </tr>
</table>

   
</form>

</center>
