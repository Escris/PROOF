<?php 
    include ("controlador/cencuesta.php");
?>
<center>
	<form name="form1" action="" method="post">
		<table width= "400">
			<tr> 
				<td colspan="2" align="center">
					<h1>ENCUESTA</h1>
			    </td>
			</tr>
                        <tr> 
				<td align="left">Nombre Encuesta</td>
				<td><input type="text" name="nombre" requiered="required" /></td>
			</tr>
			<tr> 
				<td align="left">Fecha Inicio De Encuesta</td>
				<td><input type="date" name="fecinienc" requiered="required" /></td>
			</tr>
             <tr>
             <td colspan="2" align="center">&nbsp;
		    		
		    	</td>
		    </tr>
			<tr>
				<td align="left">Fecha Final De Encuesta</td>
				<td><input type="date" name="fecfinenc" required="required" /></td>
		    </tr>
		    <tr>
             <td colspan="2" align="center">&nbsp;
		    		
		    	</td>
		    </tr>
		    <tr> 
		    	<td colspan="2" align="center">
		    		<input id="boton1" type="submit" value="Crear" class='button'/>
		    	</td>
               
		    </tr>
            <tr>
             <td colspan="2" align="center">&nbsp;
		    		
		    	</td>
                </tr>
		</table>
    </form>

    <form name="form2" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
    	<div align="center">
    		<table width="550" border="1" cellspacing="0" cellpadding="4">
    	    <tr>
    	      <td class="style1" align="center" width="80">Cod. Encuesta<input name="pac" type="hidden" id="pac" value="108"/></td>
             <td class="style1" align="center">Nombrer Encuesta</td>
              <td class="style1" align="center">Fecha Inicio</td>
              <td class="style1" align="center">Fecha Fin</td>
              <td class="style1" align="center">Editar</td>
              <td class="style1" align="center">Adicionar Pregunta</td>
              <td class="style1" align="center">Ver encuesta</td>
              <td class="style1" align="center">Estado</td>
    	    </tr>
    	    <?php 
 	//Select
		$dat = $ins->selenc();
		for ($i=0; $i < count($dat); $i++){
	  ?>   
	       <tr>
             <td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['noenc'] ?>></td>
             <td class="style1" align="center"><?php echo $dat[$i]['nombre']  ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['fecinienc']  ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['fecfinenc'] ?></td>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['noenc'] ?>&pac=108&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['noenc'] ?>&pac=115"><img border=0 src="image/add.png" title="Agregar Preguntas" width="16" height="16" /></a></td>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['noenc'] ?>&pac=109&up=11"><img border=0 src="image/ver.png" width="16" height="16" /></a></td>
             <?php if($dat[$i]['Estado']==true){ ?>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['noenc'] ?>&pac=108&est=1"><img border=0 src="image/habi_o.png" width="16" height="16" title="Deshabilitar" /></a></td>
             <?php }else if($dat[$i]['Estado']==false){ ?>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['noenc'] ?>&pac=108&est=0"><img border=0 src="image/habi_x.png" width="16" height="16" title="Habilitar" /></a></td>
           </tr>  
              <?php  } 
			
			}?>
           <tr>
		    <td colspan=6 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
           </tr>
         </table>
         <p>&nbsp; </p>
         </div>
    </form>
</center>


