<?php
include ("controlador/cubicacion.php");
?>
<center>
<form name="form1" action="home.php?pac=<?php echo $pac; ?>" method="post" ><img border=0 src="image/mapa.png" width="90" height="110" />
    <table width="400" align="center">
    <tr>
    <td colspan="2" align="center"><h1>INGRESAR UBICACION</h1></td>
    </tr>
    <tr>
    	<td>C&oacute;digo</td>
        <td><input type="text" name="codubi" /></td>
    </tr>
    <tr>
    	<td>Ciudad</td>
        <td><input type="text" name="nomubi" /></td>
    </tr>
    <tr>
    	<td>Departamento</td>
        <td><select name="depubi">
        		<?php
					for ($r=0;$r<count($dept);$r++){
						echo "<option value='".$dept[$r]['codubi']."'>".$dept[$r]['nomubi']."</option>";
					}
				?>
                <option value='0'>Crear Departamento</option>
        	</select>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><input  id="boton1" type="submit" value="Guardar" /> </td>
    </tr>
    <tr>
    	<td colspan="2" align="center">&nbsp;</td>
    </tr>
    </table>
</form>

<div align="center">  
<table width="650"><tr>
	<td>
		<form id="formfil" name="formfil" method="GET" action="home.php">
			<input name="pac" type="hidden" value="<?php echo $pac; ?>" />
			Buscar Ciudad
	        <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input  id="boton2" type="submit" name="busca" value="Buscar" />
		</form>
    </td>
	<td align="right" valign="bottom">
		<?php
			$bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
			$datos = $ins->selubi($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div>

<form name="form1" method="get" action="home.php?pac=<?php echo $pac; ?>" onsubmit="return confirm('¿Desea eliminar?')">
  <table width="400" align="center">
    <tr>
    <td colspan="4" align="center"><h1>Ciudades</h1></td>
    </tr>
    <tr>
    	<td style="text-align:center;">C&oacute;digo</td>
        <td>Ciudad</td>
        <td>Departamento</td>
        <td>Editar</td>
    </tr>
    <?php
		for ($r=0;$r<count($datos);$r++){
	?>
    <tr>
    	<td style="font-weight:bold; text-align:center;"><?php echo $datos[$r]['codubi']; ?></td>
        <td><?php echo $datos[$r]['nomubi']; ?></td>
        <td><?php echo $datos[$r]['depart']; ?></td>
        <td><a href="home.php?pac=<?php echo $pac; ?>&up=11&pr=<?php echo $datos[$r]['codubi']; ?>" ><img src="image/editar.png"  /></a></td>
    </tr>
    <?php } ?>
    </table>
</form>