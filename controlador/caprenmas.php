<?php
include ("modelo/maprenmas.php");
$ins = new maprenmas;

$action = isset($_POST["action"]) ? $_POST["action"]:NULL;
$actionS = isset($_SESSION["action"]) ? $_SESSION["action"]:NULL;
$np = isset($_SESSION["np"]) ? $_SESSION["np"]:NULL;
$archises = isset($_SESSION["archivo"]) ? $_SESSION["archivo"]:NULL;
if (($action == "upload" || $actionS == "upload")) { 
	$upfil = isset ($_FILES['archivo']['name']) ? $_FILES['archivo']['name']:NULL;
	if ($upfil){
		$tamano = $_FILES["archivo"]['size']; 
		$tipo = $_FILES["archivo"]['type']; 
		$target_path = "carga/";
		$target_path = $target_path.basename($upfil);
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)){
			echo "<script type='text/javascript'>alert('El archivo se ha cargado correctamente. Vamos a iniciar el proceso de carga a la base de datos.');</script>";
		}else{
			echo "Ha ocurrido un error al cargar el archivo, trate de nuevo!";
		}
	}
	if($action){
		$archivo = "carga/".$upfil;
	}else if($actionS){
		$archivo = "carga/".$archises;
	}

	if($archivo!="carga/"){
		echo "<br /><br /><img src='image/precarga.gif' width='64' height='64' />";
		$filas=file($archivo);
		// iniciamos contador y la fila a cero
		$numero_fila=0;
		$nfilas= count($filas);
		// mientras exista una fila	
		echo "<br /><br /><br />";
		$cantin=100;
		$npag=round($nfilas/$cantin);
		$faltante=$nfilas-$cantin*$npag;
		if($faltante>0){
			$npag=$npag+1;
		}

		if($action){
			$np=1;
			$i=1;
		}else{
			$i=$cantin*($np-1);
		}
		if ($np==$npag){
			$fin=$cantin*($np-1)+$faltante;
		}else if ($np<$npag){
			$fin=($cantin*$np);
		}
		echo round($fin*100/$nfilas)."% - ".$fin." de ".$nfilas." Insertados aproximadamente.";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		echo "<br><br><br>";
		while($i<$fin){
			$row = $filas[$i];
			$datos = explode(";",$row);
			$i++;
			$numero_fila++;
			
			$data6 = $ins->selapre($datos[3]);
			$data10 = $ins->selval($datos[2]);
			$data7 = $ins->selval($datos[5]);
			$fenaapre = substr($datos[13],6,4)."-".substr($datos[13],3,2)."-".substr($datos[13],0,2);
			
			
			
				
			if($data6[0]["ca"]==0){
				$ins->insapre($datos[3],$data10[0]['codval'],$datos[0],$datos[1],$datos[4],$data7[0]['codval'],$datos[7],
				$datos[9],$datos[10],$fenaapre,$datos[15],$datos[20],$datos[21],'usuarios',
				'2');
			
			}
		}
		$np=$np+1;
		if($action){
			$_SESSION['action'] = $action;
			$_SESSION['archivo'] = $upfil;
		}else if($actionS){
			$_SESSION['action']=$_SESSION["action"];
			$_SESSION['archivo']=$_SESSION["archivo"];
			if (($np-1)==$npag){
				$usr=$_SESSION["user"];
				$idu=$_SESSION["idUser"];
				
				$per=$_SESSION["perfil"];
				session_destroy();
				session_start();
				$_SESSION["user"] = $usr;
				$_SESSION["idUser"] = $idu;
				$_SESSION["perfil"] = $per;
				$_SESSION["autentificado"]= 10;
			}
		}
		$_SESSION['np']=$np;
		echo "<script language='Javascript'>location.href='home.php?pac=114';</script>";
	}
}
?>