<?php
	include ("controlador/cexplaboral.php");
?>
<center>
<form name="form1" action="home.php?pac=110" method="post" >
	<table width="503">
        <tr>
        	<td colspan="2" align="center">
            <h2>Actualizar Experiencia Laboral</h2>
            </td>
        </tr>
    	<tr>
        	<input type="hidden"<?php echo $dat[0]['codexplaboral'] ?>/>
            <input type="hidden" name="codexplaboral" value="<?php echo $dat[0]['codexplaboral']?>" />
            <input type="hidden" name="actu" value="actu" />
        </tr>
        <tr>
            <td align="left">Aprendiz</td>
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
        	<td align="left">Nombre de la Empresa</td>
        	<td><input type="text" name="nomempre" size="50" maxlength="50" required="required" value="<?php echo $dat[0]['nomempre'] ?>" />
           <input name="pac" type="hidden" id="pac" value="110" /></td>
        </tr>
        <tr>
        	<td align="left">Cargo que Realizo</td>
            <td><input type="text" name="cargo" size="50" maxlength="50" required="required" value="<?php echo $dat[0]['cargo'] ?>" />
           <input name="pac" type="hidden" id="pac" value="110" /></td>
        </tr>
        <tr>
        	<td align="left">Direccion de la Empresa</td>
        	<td><input type="text" name="direccion" size="50" maxlength="50" required="required" value="<?php echo $dat[0]['direccion'] ?>" />
           <input name="pac" type="hidden" id="pac" value="110" /></td>
        </tr>
        <tr>
            <td align="left">Telefono</td>
            <td><input type="text" name="telefono" size="50" maxlength="50" required="required" value="<?php echo $dat[0]['telefono'] ?>" />
           <input name="pac" type="hidden" id="pac" value="110" /></td>
        </tr>
        <tr>
        	<td align="left">Fecha Ingreso </td>
        	<td><input type="date" name="ingreso" requiered="required" value="<?php echo $dat[0]['ingreso']?>" />
            <input name="pac" type="hidden" id="pac" value="110"/></td>
        </tr> 
        <tr>
        	<td align="left">Fecha Retiro </td>
        	<td><input type="date" name="retiro" requiered="required" value="<?php echo $dat[0]['retiro']?>" />
            <input name="pac" type="hidden" id="pac" value="110"/></td>
        </tr> 
        <tr>
            <td align="left">Motivo de Retiro </td>
            <td><textarea id="motivo" name="motivo" cols="47" rows="3" requiered="required" <?php echo $dat[0]['motivo']?>></textarea>
          	<input name="pac" type="hidden" id="pac" value="110" /></td>
        </tr>
	    <tr>
            <td height="65" colspan="2" align="center">
				<input type="submit" value="Guardar" />
            </td>
        </tr>
    </table>
</form>


<form id="form2" name="form2" method="GET" action="vexplaboral.php" onSubmit="return confirm('¿Desea eliminar?')">
  <div align="center">
    <table width="650" border="1" cellspacing="0" cellpadding="4">
    <tr>
        <td class="style1" align="center" width="80">Cod. Experiencia<input name="pac" type="hidden" id="pac" value="110" /></td>
        <td class="style1" align="center" width="60">Aprendiz</td>
        <td class="style1" align="center" width="160">Empresa</td>
        <td class="style1" align="center" width="160">Cargo</td>
        <td class="style1" align="center" width="160">Direccion</td>
        <td class="style1" align="center" width="160">telefono</td>
        <td class="style1" align="center" width="160">ingreso</td>
        <td class="style1" align="center" width="160">retiro</td>
        <td class="style1" align="center" width="60">motivo</td>
    </tr>
 <?php 
 	//Select
		$dat = $ins->selexp();
		for ($i=0; $i < count($dat); $i++){
	  ?>
        <tr>
		    <td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['codexplaboral'] ?>></td>
            <td class="style2" align="left"><?php echo $dat[$i]['aprendiz'] ?></td>  
            <td class="style2" align="left"><?php echo $dat[$i]['nomempre'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['cargo'] ?></td>
            <td class="style2" align="left"><?php echo $dat[$i]['direccion'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['telefono'] ?></td>
            <td class="style2" align="left"><?php echo $dat[$i]['ingreso'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['retiro'] ?></td>
            <td class="style2" align="left"><?php echo $dat[$i]['motivo'] ?></td>		
        </tr>
      <?php  }  ?>
         <tr>
		    <td colspan=9 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
    </table>
    <p>&nbsp; </p>
  </div>
</form>

</center>


