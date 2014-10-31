<?php
include ("controlador/cparametro.php");
?>
<center>
<form name="form1" action="home.php?pac=<?php echo $pac; ?>" method="post" >
<!--<form name="form1" action="home.php?pac=102" method="post" >-->
	<table width="400">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Modificar Parametro</h2>
            </td>
        </tr>
    	<tr>
	       	<td align="left">Nombre de Parametro</td>
        	<td><input type="text" name="nompar" size="30" maxlength="30" required="required" value="<?php echo $dat5[0]['nompar'] ?>"/>
			<input type="hidden" name="actu" value="actu" /><input type="hidden" name="codpar" value="<?php echo $dat5[0]['codpar'] ?>"/></td>
        </tr>  
        <tr>
        	<td colspan="2" align="center">
            	<input  id="boton1" type="submit" value="Editar" />
            </td>
        </tr>        
    </table>
</form>

