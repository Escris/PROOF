<?php
	include ("../modelo/minspre.php");
	$ins = new minspre;
	$cant = isset($_POST['cant']) ? $_POST['cant']:NULL;
	$codpre = isset($_POST['codpre']) ? $_POST['codpre']:NULL;
        $noenc =  isset($_POST["noenc"]) ? $_POST["noenc"]:NULL;
	for($i=0;$i<$cant;$i++){
		$res = isset($_POST['res'.$i]) ? $_POST['res'.$i]:NULL;  
                		//$chk = isset($_POST['chk'.$i]) ? $_POST['chk'.$i]:NULL;
		$ins->insres($codpre,$res);
	}
	echo '<script>window.alert("Se crearon las respuesta exitosamente!!!");</script>';
	echo "<script type='text/javascript'>window.location='../home.php?pr=".$noenc."&pac=115';</script>";
?>