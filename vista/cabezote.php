<table background="image/cabez.jpg" width="949px" height="111px" cellpadding="0" cellspacing="0">
<tr>
<td width="150px">
</td>
<td width="800px" align="right" class="Texticot">&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
<table background="../image/barra.jpg" width="950px" height="15px" cellpadding="0" cellspacing="0">
<tr>
		<td align="left"  style="color:black;" class="Texticot2">
			<?php
				$usrr = isset($_SESSION["user"]) ? $_SESSION["user"]:NULL;
				if ($usrr){
					echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>Bienvenido ".$usrr."</b>";
				}
            ?>
        </td>
<td class="Texticot2" style="color:black;" align="right">
<?php
date_default_timezone_set("America/Bogota");
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
echo strftime($dias[date('w')].", %d de ".$mes[date('n')]." del %Y");
?>
&nbsp;&nbsp;&nbsp;
</td>
</tr>
</table>