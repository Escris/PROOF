<?php
	include ("controlador/cprograma.php");
	?>
<center>
<form name="form1" action="home.php?pac=105" method="post" >
	<table width="400" >
        <tr>
        	<td colspan="2" align="center">
            	<h1>Editar Programa</h1>
            </td>
            
          </tr>
           <tr>
        	<td align="left">Codigo del Programa</td>
        	<td><input type="text" name="codpro" size="15" maxlength="15" required="required" value="<?php echo $dat[0]['codpro'] ?>" />
            <input type="hidden" name="actu" value="actu" /></td>
        </tr>
        <tr>
        	<td align="left">Nombre del Programa</td>
        	<td><input type="text" name="nompro" size="40" maxlength="50" required="required" value="<?php echo $dat[0]['nompro'] ?>" />
         </td>
        </tr>
        <tr>
        	<td align="left">Version del Programa</td>
        	<td><input type="text" name="verpro" size="15" maxlength="15" required="required" value="<?php echo $dat[0]['verpro'] ?>"/></td>
        </tr>
         <tr>
        	<td colspan="2" align="center">
            	<input id="boton1" type="submit" value="Guardar" />
            </td>
        </tr>
        	
    </table>
</form>


</center>