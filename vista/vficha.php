<?php
	include ("controlador/cficha.php");
?>
<center>
<form name="form1" action="" method="post" >
	<table width="400" >
        <tr>
        	<td colspan="2" align="center">
            	<h1>INSERTAR FICHA</h1>
            </td>
          </tr>
           <tr>
        	<td align="left">Numero de ficha</td>
        	<td><input type="text" name="nfic" size="30" maxlength="50" required="required" /></td>
        </tr>
         <tr>
        	<td colspan="2" align="center">
            	</br>               
            </td>
        </tr>
        	<tr>
			<td>Fecha Inicio</td><td><input type="date"  name="finific" ></td>
            </tr>
             <tr>
        	<td colspan="2" align="center">
            	</br>               
            </td>
        </tr>
            <tr>
			<td>Fecha Fin</td><td><input type="date"  name="ffinfic" ></td>
     	</tr>
         <tr>
        	<td colspan="2" align="center">
            	</br>               
            </td>
        </tr>
		 <tr>
        	<td align="left">Jornada de la ficha</td>
        		<td>
               <select name="jorfic" >
               
             <?php 
 	//Select
				for ($i=0; $i < count($dat2); $i++){
	  ?>
            
            <option value="<?php echo $dat2[$i]['codval']?>"><?php echo $dat2[$i]['nomval']?></option>
            
            <?php } ?>
            	</select>
            </td>
        </tr>
	 <tr>
        	<td colspan="2" align="center">
            	</br>               
            </td>
        </tr>
        <tr>
        	<td align="left">Oferta</td>
        		<td>
               <select name="ofefic">
             <?php 
 	//Select
		
		for ($s=0; $s < count($dat3); $s++){
	  ?>
            
            <option value="<?php echo  $dat3[$s]['codval']?>"><?php echo $dat3[$s]['nomval']?></option>
            
            <?php } ?>
            	</select>
            </td>
        </tr>
      <tr>
        	<td colspan="2" align="center">
            	</br>               
            </td>
        </tr>
       <tr>
        	<td align="left">Modalidad de Formacion</td>
        		<td>
               <select name="modfic">
             <?php 
 	//Select
		
		for ($i=0; $i < count($dat4); $i++){
	  ?>
            
            <option value="<?php echo $dat4[$i]['codval']?>"><?php echo $dat4[$i]['nomval']?></option>
            
            <?php } ?>
            	</select>
            </td>
        </tr>
         <tr>
        	<td colspan="2" align="center">
            	</br>               
            </td>
        </tr>
        <tr>
        	<td align="left">Programa de formacion</td>
        	<td>
               <select name="codpro" style="width:200px;" >
             <?php 
 	//Select
		
	
		for ($i=0; $i < count($dat1); $i++){
	  ?>
            <option  value="<?php echo $dat1[$i]['codpro'] ?>"><?php echo $dat1[$i]['nompro'] ?></option>
            <?php  } ?>
            	</select>
            </td>
        </tr>
         <tr>
        	<td colspan="2" align="center">
            	</br>               
            </td>
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
		    No. Ficha
	        <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="Button" name="boton" value="Buscar" onChange="this.form.submit();">
		</form>
    </td>
	<td align="right" valign="bottom">
		<?php
			$bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
			$dat=$ins->selfic($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
        
    </td>
</tr></table></div>

<h2>Fichas Activas</h2>
<form  name="form2" method="get" action="home.php?pac=<?php echo $pac; ?>" onSubmit="return confirm('¿Desea eliminar?')">
  
  <div align="center">
    <table width="650" border="1" cellspacing="0" cellpadding="4">

      <tr>
        <td class="style1" align="center" width="160">No. Ficha<input name="pac" type="hidden" id="pac" value="<?php echo $pac; ?>"/></td>
        <td class="style1" align="center" width="160">Fecha Inicio</td>
        <td class="style1" align="center" width="160">Fecha Fin</td>
        <td class="style1" align="center" width="160">Jornada</td>
        <td class="style1" align="center" width="160">Oferta</td>
        <td class="style1" align="center" width="160">Modalidad</td>
        <td class="style1" align="center" width="460">Programa de Formacion</td>
        <td class="style1" align="center" width="60">Editar</td>
       
      </tr>
         <?php 
 	//Select
		
		//echo count($dat);
		for ($i=0; $i < count($dat); $i++){
			
	  ?>
   
 		  <tr>

		    <td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['nfic'] ?>></td>
            <td class="style2" align="center"><?php echo $dat[$i]['finific']  ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['ffinfic'] ?></td>
            <td class="style2" align="center"><?php echo $dat5[$i]['jf'] ?></td>
            <td class="style2" align="center"><?php echo $dat5[$i]['of'] ?></td>
            <td class="style2" align="center"><?php echo $dat5[$i]['mf'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['nompro'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['nfic'] ?>&pac=<?php echo $pac; ?>&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
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