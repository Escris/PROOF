<?php
include ("controlador/conexion.php");
class mencuestav{
	var $arr;
	function mencuestav(){}


    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selenc(){
		$sql= "SELECT * FROM encuesta";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selapre($ndocusu){
		$sql= "SELECT ndocapre, nfic FROM aprendiz WHERE ndocapre='".$ndocusu."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selenc1($noenc){
        $sql = "SELECT  noenc, fecinienc, fecfinenc,nombre FROM encuesta WHERE noenc = '".$noenc."';";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}
		function selpre(){
		$sql = "SELECT codpre,despre,tppre,canrespre,noenc FROM pregunta;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		function selpre3(){
		$sql = "SELECT codres,res,codpre FROM respuesta;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		function selprog(){
		$sql = "SELECT ficha.nfic , ficha.finific , ficha.ffinfic , ficha.jorfic , ficha.ofefic , ficha.codpro, programa.nompro , ficha.modfic FROM ficha INNER JOIN programa ON ficha.codpro = programa.codpro";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		
	function selenc2($pr){
		$sql = "SELECT noenc ,  fecinienc ,  fecfinenc ,  nombre ,  Estado, (SELECT  pre.noenc
FROM resapre As res INNER JOIN pregunta As pre 
ON res.codpre=pre.codpre 
WHERE  res.nodcapre='".$pr."' and encuesta.noenc=pre.noenc
group by pre.noenc) as b
FROM encuesta";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>