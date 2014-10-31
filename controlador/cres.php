  <?php

//se requiere para la respuesta 
	include ("modelo/mres.php");
	$ins = new mpregunta1();
	$id = isset($_POST["id"]) ? $_POST["id"]:NULL;
	$despre = isset($_POST["despre"]) ? $_POST["despre"]:NULL;
	$tppre = isset($_POST["tppre"]) ? $_POST["tppre"]:NULL;
	$codpre = isset($_POST["codpre"]) ? $_POST["codpre"]:NULL;
	$canrespre = isset($_POST["canrespre"]) ? $_POST["canrespre"]:NULL;
	$noenc =  isset($_POST["noenc"]) ? $_POST["noenc"]:NULL;
	//Insertar$despre, $canrespre, $noenc, $tppre
        $eliminar=isset($_GET["del"]) ? $_GET["del"]:NULL;
        $eliminar_respuesta=isset($_GET["pr"]) ? $_GET["pr"]:NULL;
        $eliminar_encuesta=isset($_GET["cod_encuesta"]) ? $_GET["cod_encuesta"]:NULL;
        if(!is_null($eliminar) && !is_null($eliminar_respuesta)){
            $ins->eliminarRespuesta($eliminar_respuesta);
            echo '<script>window.alert("Se elimino la respuesta exitosamente!!!");</script>';
            header('Location: home.php?pac=115&pr='.$eliminar_encuesta);
        }
	if($despre && $canrespre && $tppre && $noenc){
		$ins->inspre($despre, $tppre, $canrespre, $noenc);
		echo '<script>window.alert("Se creo la respuesta exitosamente!!!");</script>';
                
	}
        if($tppre==27 || $tppre==28 || $tppre==24) //24 Falso Verdadero, 27 Experiencia, 28 Abierta
            header('Location: home.php?pac=115&pr='.$noenc);
        $dat1 = $ins->selpre($despre, $tppre, $canrespre, $noenc);
?>

