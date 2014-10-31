<?php
include ("/controlador/cparametro.php");
?>

<center>

<form name="form1" action="home.php?pac=<?php echo $pac; ?>" method="post" >
	<table width="400">
        <tr>
        	<td colspan="2" align="center">
            	<h1>INSERTAR PARAMETRO</h1>
            </td>
        </tr>
        
    	<tr>
        	<td align="left">Nombre de Parametro</td>
        	<td><input type="text" name="nompar" size="30" maxlength="30" required="required" />
			
            <td colspan="2" class="style1" align="center">
            
        <tr>
        	<td colspan="4" align="center">
            <label> Tipo de Guardado</label>
             <table width="150" border="1" cellspacing="0" cellpadding="4">
             <tr class="style1" align="center" width="170">
             <td>
             <label>Permanente</label>
             <input type= "radio" name="parametro_fijo" value='0'>
             <label>Parcial</label>
             <input type= "radio" name="parametro_fijo" value='1'>
             </td>
             </tr>
             </table>
            	<input id="boton1" type="submit" value="Guardar" />
            </td>
        </tr>        
    </table>
</form>



<form id="form2" name="form2" method="GET" action="home.php?pac=<?php echo $pac; ?>" onSubmit="return confirm('¿Eliminara El Parametro y sus Valores asociados desea continuar?')">
  
  <div align="center">
    <table width="550" border="1" cellspacing="0" cellpadding="4">

	<tr>
        <td class="style1" align="center" width="80">Cod. Parametro<input name="pac" type="hidden" id="pac" value="102" /></td>
        <td class="style1" align="center" width="160">Nombre Parametro</td>
        <td class="style1" align="center" width="60">Editar</td>																	   	</tr>
 	<?php 
 		//Select
			$datos = $ins->selpar();
			for ($i=0; $i < count($datos); $i++){
	?>
    <td class="style2" align="center">
     <?php if ($datos[$i]['parametro_fijo']==0){ 
     	echo $datos[$i]['codpar'];
	 }else{ ?>           
		<input type="submit" name="del" value=<?php echo $datos[$i]['codpar']?>>
        <?php } ?>
        </td>
            <td class="style2" align="left"><?php echo $datos[$i]['nompar'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $datos[$i]['codpar'] ?>&pac=102&up=11&ed=0"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>    
		</tr>
        
	<?php  }  ?>
     
         <tr>
		    <td colspan=8 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
    </table>
    <p>&nbsp; </p>
  </div>
</form>
</center>


<div class="division">
</div>

<center>
<form name="form3" action="" method="post" >
	<table width="400">
        <tr>
        	<td colspan="4" align="center">
            	<h2>Insertar Valores</h2>
            </td>
        </tr>
      
    	<tr>
        	<td>Nombre del Valor</td>
        	<td><input type="text" name="nomval" size="30" maxlength="30" required="required" /></td>
        	<td align="left">Parametro</td>
        	<td>
               <select name="codpar">
               
	<?php 
 	//Select
		$dat1 = $ins->selpar();
		for ($i=0; $i < count($dat1); $i++){
	  ?>
            
            <option value="<?php echo $dat1[$i]['codpar'] ?>" ><?php echo $dat1[$i]['nompar'] ?></option>
            
            <?php } ?>
            	</select>
            </td>
            
        </tr>
             <tr>
        	<td colspan="4" align="center">
            <label> Tipo de Guardado</label>
             <table width="150" border="1" cellspacing="0" cellpadding="4">
             <tr class="style1" align="center" width="170">
             <td>
             <label>Permanente</label>
             <input type= "radio" name="valor_fijo" value='0'>
             <label>Parcial</label>
             <input type= "radio" name="valor_fijo" value='1'>
             </td>
             </tr>
             </table>
            	<input id="boton1" type="submit" value="Guardar" />
            </td>
        </tr>
  
        <tr>
        	<td colspan="2" align="center">
            	<!--<input type="submit" value="Guardar" /> -->
            </td></tr>
        </table>
</form>
<br /><br />
   <div align="center"><table width="550"><tr>
	<td>
		<form id="formfil" name="formfil" method="GET" action="home.php">
			<input name="pac" type="hidden" value="<?php echo $pac; ?>" />
		    Nombre del Valor
	        <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="Submit" name="buscar" value="Buscar" />
		</form>
    </td>
	<td align="right" valign="bottom">
		<?php
			$bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
			$datos = $ins->selpaji($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div>
<form id="form4" name="form1" method="get" action="" onSubmit="return confirm('¿Eliminara los valores Desea Continuar?')">
  
  
    	<table width="550" border="1" cellspacing="0" cellpadding="4">
          <tr>
        	<td colspan="2" align="center">
             </td>
        </tr>

      	<tr>
        	<td class="style1" align="center" width="80">Cod. Valor<input name="pac" type="hidden" id="pac" value="102" /></td>
        <td class="style1" align="center" width="160">Nombre Valor</td>
        <td class="style1" align="center" width="160">Nombre Parametro</td>
        <td class="style1" align="center" width="60">Editar</td>
        </tr>
        <?php 
 		//Select
			
		$dato = $ins->selval1();
			
			for ($i=0; $i < count($datos); $i++){
	?>	
    <tr>           
		<td class="style2" align="center">
     <?php if ($datos[$i]['valor_fijo']==0){ 
     	echo $datos[$i]['codval'];
	 }else{ ?>           
		<input type="submit" name="del2" value=<?php echo $datos[$i]['codval']?>>
        <?php } ?>
        </td>
            <td class="style2" align="left"><?php echo $datos[$i]['nomval'] ?></td>
            <td class="style2" align="left"><?php echo $datos[$i]['nompar'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $datos[$i]['codval'] ?>&pac=124&up=11&ed=1&prr=<?php echo $datos[$i]['codpar'] ?>"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>    
		</tr>
      
        
	<?php  }  ?>

    <tr>
    <td><?php // echo"<p>".$_pagi_navegacion."</p>"; ?></td>
	</tr>
    </table>
</form>
</select>
</center>