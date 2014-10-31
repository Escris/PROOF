<?php
    include ("controlador/ccontra.php");
?>
<div align="center">
<?php 
if (!$datos){
?>
<p id="tit1">Restablecer Contraseña</p>

    <form  id="form1" name="form1" method="post" action="">
        <table width="450"  align="center" class="Table" >
            <tr>
            	<td align="center" colspan="2" ><h1 style="color:white;">Paso 1</h1></td>
            </tr>
            <tr>
                <td align="center" style="color:white;">Ingrese el n&uacute;mero de su documento de identidad:</td></tr>
                <tr>
                <td align="center">
                <input name="ndocapre" type="text" id="CampoTxt" maxlength="30" size="21" /></td>
                </tr>
                </br>
                <tr>
                <td align="center">
                <input id="boton1" type="submit" value="Verificar" />
                <input id="boton1" type="button" value="volver" onclick="location='index.php'" />
                </td>
                </tr>
                </td>
            </tr>
        </table>
    </form>
   
    <?php if ($nodoc) { echo '<script type="text/javascript">alert("Usuario no Existe");</script>'; } ?>
<?php 
}else{
	//echo $datos[0]['nomcom']." - ".$datos[0]['emaapre']." - ".$datos[0]['pass'];
?>
<p id="tit1">Restablecer Contraseña</p>
    <table width="450"  align="center" class="Table">
        <tr>
            <td align="Center"><h1  style="color:white;">Paso 2</h1></td>
        </tr>
        <tr>
            <td align="center"  style="color:white;">
              <?php
				$Correo = $datos[0]['emaapre'];
				$pass = $datos[0]['pass'];
			  	$Asunto = "Recuperación de contraseña";
				$Mensaje = "Su contraseña es:  ".$pass.". Muchas gracias por su atención.";
			  	mail($Correo,$Asunto,$Mensaje);
				$em = substr($datos[0]['emaapre'],0,4)."******".substr($datos[0]['emaapre'],strpos($datos[0]['emaapre'],"@"),4)."***.***.**";
			  ?>
Se&ntilde;or(a): <?php echo $datos[0]['nomcom']; ?> su contrase&ntilde;a ha sido enviada a el correo <?php echo $em; ?><br /><br /><br />
<tr>
			 <td align="center">
			    <input id="boton1" type="button" value="volver" onclick="location='index.php'" />
               </td>
</tr>
            </td>
        </tr>
    </table>
<?php 
}
?>
</div>