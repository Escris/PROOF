<?php
	include ("controlador/cprograma.php");
?>
<center>
<form name="form1" action="" method="post" >
	<table width="400" >
        <tr>
        	<td colspan="2" align="center">
            	<h1>INSERTAR PROGRAMA</h1>
            </td>
          </tr>
           <tr>
        	<td align="left">Codigo del Programa</td>
        	<td><input type="text" name="codpro" size="15" maxlength="15" required="required" /></td>
        </tr>
        <tr>
        	<td align="left">Nombre del Programa</td>
        	<td><input type="text" name="nompro" size="40" maxlength="50" required="required" /></td>
        </tr>
        <tr>
        	<td align="left">Version del Programa</td>
        	<td><input type="text" name="verpro" size="15" maxlength="15" required="required" /></td>
        </tr>
         <tr>
        	<td colspan="2" align="center">
            	<input id="boton1" type="submit" value="Guardar" />
            </td>
        </tr>
        	
    </table>
</form>

<div align="center"><table width="650"><tr>
	<td>
		<form id="formfil" name="formfil" method="GET" action="home.php">
			<input name="pac" type="hidden" value="<?php echo $pac; ?>" />
		    No. Programa
	        <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
		</form>
    </td>
	<td align="right" valign="bottom">
		<?php
			$bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
			$dat=$ins->selpro2($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div>


<h2>Programas Activos</h2>
<form id="form2" name="form2" method="get" action="" onSubmit="return confirm('¿Desea eliminar?')">
  
  <div align="center">
    <table width="650" border="1" cellspacing="0" cellpadding="4">

      <tr>
        <td class="style1" align="center" width="160">No. Programa<input name="pac" type="hidden" id="pac" value="105"/></td>
        <td class="style1" align="center" width="160">Nombre del Programa</td>
        <td class="style1" align="center" width="160">Version del programa</td>
        <td class="style1" align="center" width="60">Editar</td>
       </tr>
         <?php 
 	//Select
		//$dat=$ins->selpro();
		for ($i=0; $i < count($dat); $i++){
			
	  ?>
   
 		  <tr>

		    <td class="style2" align="center"><input type="submit" name="del" value="<?php echo $dat[$i]['codpro'] ?>"></td>
            <td class="style2" align="center"><?php echo $dat[$i]['nompro']  ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['verpro'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['codpro'] ?>&pac=<?php echo $pac; ?>&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
           <?php  }  ?>
			
        </tr>
         <tr>
		    <td colspan=8 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
      </table>
    <p>&nbsp; </p>
  </div>
</form>

</center>