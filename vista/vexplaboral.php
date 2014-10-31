<?php
	include ("controlador/cexplaboral.php");
?>

<center>
<form name="form1" action="" method="post" >
	<table width="500">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Agregar Experiencia Laboral</h2>
            </td>
        </tr>
        <tr>
            <td align="left">Nombre del Aprendiz: </td>
            <td>
            <select name="ndocapre">
             <?php 
             //Select
            $dat1 = $ins->selapren();
            for ($i=0; $i < count($dat1); $i++){
            ?>
            <option value="<?php echo $dat1[$i]['ndocapre'] ?>"><?php echo $dat1[$i]['nomapre'] ?></option>
            <?php } ?>
            </select>
            </td>
        </tr>
    	<tr>
        	<td width="76" align="left">Nombre de la Empresa </td> 		
            <td><input type="text" name="nomempre" size="50" maxlength="50" required="required" /></td>
        </tr>
        <tr>
        	<td align="left">Cargo que Realizo </td>
        	<td><input type="text" name="cargo" size="50" maxlength="50" required="required" /></td>
        </tr>
        <tr>
        	<td align="left">Direccion de la Empresa </td>
        	<td><input type="text" name="direccion" size="50" maxlength="50" required="required" /></td>
        </tr>
        <tr>
        	<td align="left">Telefono </td>
        	<td><input type="text" name="telefono" size="50" maxlength="50" required="required" /></td>
        </tr>
        <tr>
        	<td align="left">Fecha Ingreso </td>
        	<td><input type="date" name="ingreso" size="10" maxlength="50" required="required" /></td>
        </tr> 
        <tr>
        	<td align="left">Fecha Retiro </td>
        	<td><input type="date" name="retiro" size="10" maxlength="50" required="required" /></td>
        </tr> 
        <tr>
            <td align="left">Motivo de Retiro </td>
            <td><textarea id="motivo" name="motivo" cols="47" rows="3" required></textarea></td>
        </tr>
	    <tr>
            <td height="65" colspan="2" align="center">
            <input type="submit" value="Guardar" />
            </td>
        </tr>
    </table>
</form>


<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('¿Desea eliminar?')">
  <div align="center">
    <table width="650" border="1" cellspacing="0" cellpadding="4">
      <tr>
        <td class="style1" align="center" width="80">Cod. Experiencia<input name="pac" type="hidden" id="pac" value="110" /></td>
        <td class="style1" align="center" width="160">Aprendiz</td>
        <td class="style1" align="center" width="160">Empresa</td>
        <td class="style1" align="center" width="160">Cargo</td>
        <td class="style1" align="center" width="160">Direccion</td>
        <td class="style1" align="center" width="160">Telefono</td>
        <td class="style1" align="center" width="160">Fecha Ingreso</td>
        <td class="style1" align="center" width="160">Fecha Retiro</td>
        <td class="style1" align="center" width="160">Motivo</td>
        <td class="style1" align="center" width="60">Editar</td>
      </tr>
 <?php 
 	//Select
		$dat = $ins->selexp();
		for ($i=0; $i < count($dat); $i++){
	  ?>
        <tr>
		    <td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['codexplaboral'] ?>></td>
            <td class="style2" align="center"><?php echo $dat[$i]['aprendiz'] ?></td>
            <td class="style2" align="left"><?php echo $dat[$i]['nomempre'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['cargo'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['direccion'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['telefono'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['ingreso'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['retiro'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['motivo'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['codexplaboral'] ?>&pac=110&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
        </tr>
      <?php  }  ?>
 
         <tr>
		    <td colspan=10 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
    </table>
    <p>&nbsp; </p>
  </div>
</form>

</center>


