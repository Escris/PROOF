<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/png" href="image/logo-sena.png" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/menstyle.css" type="text/css" />
<title>..::::Bienestar Centro de desarrollo agroempresarial SENA ::::..</title>
</head>
<body>
<center>
<div id="contenedor">
	<div id="encabe">
    <?php
		include("vista/cabezote.php");
	?>
    </div>
    <div id="registror">
    <div></div>
	<div id="contenidorc" class="bodytext">
        <?php 
			$Pac = isset($_GET["pac"]) ? $_GET["pac"]:NULL;
			if (is_null($Pac)){
				include ("vista/vingreso.php");
			}else if ($Pac=="131"){
				include ("vista/vcontra.php");
			}else if ($Pac=="132"){
				include ("vista/vcontra1.php");
			}else if ($Pac=="130"){
				include ("vista/vregistro1.php");
			}
        ?>
	</div>
    </div>
	<div id="piec">
	<?php
    include("vista/pie.php");
    ?>
    </div>
</div>
</center>
</body>
</html>