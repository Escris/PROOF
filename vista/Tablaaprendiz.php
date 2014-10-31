<?php

include ("../controlador/conexion.php");
	$valor = $_REQUEST["valor"];
	$sql2 = "SELECT * FROM aprendiz where ndocapre='".$valor."';";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$estados = $conexionBD->ejeCon($sql2,0);		   
			$documento = $estados[0]['ndocapre'];
			$tipo_D = $estados[0]['tdocapre'];
			$estado = $estados[0]['estcapre'];
			$nombre = $estados[0]['nomapre'];
			$apellido = $estados[0]['apeapre'];
			$telefono = $estados[0]['telapre'];
			$telefono_A = $estados[0]['telefono'];
			$mail = $estados[0]['emaapre'];
			$mail_A = $estados[0]['email'];
			$direccion = $estados[0]['dirapre'];
			$tipo_S = $estados[0]['sangre'];
			$genero = $estados[0]['genapre'];
			$libreta = $estados[0]['nlmiapre'];
			$ciudad = $estados[0]['codubi'];
			$nacimiento = $estados[0]['fenaapre'];
			$inicio = $estados[0]['fechadeinicio'];
			$ficha = $estados[0]['nfic'];
			$familiar = $estados[0]['llamaapre'];
			$familiar_N = $estados[0]['teleapre'];
			$contraseña = $estados[0]['pass'];

	$sql = "SELECT codval, nomval FROM valor WHERE codval='".$tipo_D."';";
	$sql1 = "SELECT codval, nomval FROM valor WHERE codval='".$estado."';";
	$sql3 = "SELECT codval, nomval FROM valor WHERE codval='".$tipo_S."';";
	$sql4 = "SELECT codval, nomval FROM valor WHERE codval='".$genero."';";
	$sql5 = "SELECT codubi, nomubi, depubi FROM ubicacion WHERE codubi='".$ciudad."';";
	$sql6 = "SELECT codubi, nomubi FROM vieubica WHERE codubi='".substr($ciudad, 0,-3)."';";
	$sql7 = "SELECT nfic, codpro FROM ficha WHERE nfic='".$ficha."';";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	$data1 = $conexionBD->ejeCon($sql1,0);
	$data3 = $conexionBD->ejeCon($sql3,0);
	$data4 = $conexionBD->ejeCon($sql4,0);
	$data5 = $conexionBD->ejeCon($sql5,0);
	$data6 = $conexionBD->ejeCon($sql6,0);
	$data7 = $conexionBD->ejeCon($sql7,0);
	$sql8 = "SELECT codpro, nompro FROM programa WHERE codpro='".$data7[0]['codpro']."';";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data8 = $conexionBD->ejeCon($sql8,0);

			$tr0 = '<tr><td></td><td></td><td></td></tr>';
			$tr1 = '<tr><td>Numero del Documento: '.$documento.'</td><td>Tipo del Documento: '.$data[0]['nomval'].'</td><td>Estado Civil: '.$data1[0]['nomval'].'</td></tr>';
			$tr2 = '<tr><td>Nombres: '.ucwords($nombre).'</td><td>Apellidos: '.ucwords($apellido).'</td><td>Tipo de Sangre: '.$data3[0]['nomval'].'</td></tr>';
			$tr3 = '<tr><td>Fecha de Nacimiento: '.$nacimiento.'</td><td>Genero: '.$data4[0]['nomval'].'</td><td></td></tr>';
			$tr4 = '<tr><td>E-mail: '.$mail.'</td><td>E-mail Adicional: '.$mail_A.'</td><td>Telefono Adicional: '.$telefono_A.'</td></tr>';
			$tr6 = '<tr><td>Departamento: '.$data6[0]['nomubi'].'</td><td>Ciudad: '.ucwords($data5[0]['nomubi']).'</td><td></td></tr>';
			$tr7 = '<tr><td>Direccion: '.$direccion.'</td><td>Numero de la Libreta M. : '.$libreta.'</td><td>Telefono: '.$telefono.'</td></tr>';
			$tr8 = '<tr><td></td><td>Fecha de Ingreso: '.$inicio.'</td><td>Contraseña: '.$contraseña.'</td></tr>';
			$tr9 = '<tr><td>Ficha: '.$ficha.'</td><td colspan="2">Programa: '.$data8[0]['nompro'].'</td></tr>';
			$tr10 = '<tr><td>Familiar: '.$familiar.'</td><td>Telefono del Familiar: '.$familiar_N.'</td><td></td></tr>';
			$div = '<table class="tablas" align="center" cellspacing="6" rules="groups" width="700" height="300" border="1">'.
			$tr1.$tr2.$tr3.$tr7.$tr4.$tr6.$tr10.$tr9.$tr0.$tr8.'</table>';
			echo $div;
?>
