<?php
	include ("modelo/mperfil.php");
	$ins = new mperfil();
	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->delper($del);
	}
	$idper = isset($_POST["idper"]) ? $_POST["idper"]:NULL;
	$nomper = isset($_POST["nomper"]) ? $_POST["nomper"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
	//Actualizar
	if ($idper && $nomper && $actu){
		$ins->updper($idper,$nomper);
	}
	
	//Insertar
	if ($nomper  && !$actu){
		$ins->insper($nomper);
	}
?>
<center>
<form name="form1" action="" method="post" >
	<table width="400">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Insertar Perfil</h2>
            </td>
        </tr>
    	<tr>
        	<td align="left">Nombre</td>
        	<td><input type="text" name="nomper" size="30" maxlength="20" required="required" /></td>
        </tr>
  
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Guardar" />
            </td>
        </tr>
        
    </table>
</form>


<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('¿Desea eliminar?')">
  
  <div align="center">
    <table width="550" border="1" cellspacing="0" cellpadding="4">

      <tr>
        <td class="style1" align="center" width="80">Codigo<input name="pac" type="hidden" id="pac" value="104" /></td>
        <td class="style1" align="center" width="160">nombre</td>
        <td class="style1" align="center" width="60">Editar</td>
        </tr>
 <?php 
 	//Select
		$dat = $ins->selper();
		for ($i=0; $i < count($dat); $i++){
	  ?>
        <tr>
           
		    <td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['idper']?>></td>
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

