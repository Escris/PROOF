
<?php
	include ("modelo/mperfil.php");
	$ins = new mperfil();
	
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$dat = $ins->selper1($pr);
?>
<center>
<form name="form1" action="home.php?pac=104" method="post" >
	<table width="400">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Actualizar Usuario</h2>
            </td>
        </tr>
    	<tr>
        	<td align="left">C&oacute;digo</td>
        	<td><?php echo $dat[0]['idper'] ?>
            <input type="hidden" name="idper" value="<?php echo $dat[0]['idper'] ?>" />
            <input type="hidden" name="actu" value="actu" />
            </td>
        </tr>
    	<tr>
        	<td align="left">Nombre</td>
        	<td><input type="text" name="nomper" size="30" maxlength="20" required value="<?php echo $dat[0]['nomper'] ?>" />
				<input name="pac" type="hidden" id="pac" value="104" /></td>
        </tr>
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Editar" />
            </td>
        </tr>
    </table>
</form>


<form id="form2" name="form2" method="get" action="home.php?pac=104" onSubmit="return confirm('¿Desea eliminar?')">
  
  <div align="center">
    <table width="650" border="1" cellspacing="0" cellpadding="4">

      <tr>
        <td class="style1" align="center" width="80">Codigo perfil.<input name="pac" type="hidden" id="pac" value="104"></td>
        <td class="style1" align="center" width="160">Nombre Perfil</td>
        <td class="style1" align="center" width="60">Editar</td>
      </tr>
 <?php 
 	//Select
		$dat = $ins->selper();
		for ($i=0; $i < count($dat); $i++){
	  ?>
        <tr>

		    <td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['idper'] ?>></td>
           <td class="style2" align="left"><?php echo $dat[$i]['nomper'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['idper'] ?>&pac=104&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
		
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


