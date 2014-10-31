<?php


/**
 * Variables que se pueden definir antes de incluir el script v�a include():
 * ------------------------------------------------------------------------
 * $_pagi_sql 					OBLIGATORIA.		Cadena. Debe contener una sentencia sql v�lida (y sin la cl�usula "limit").
 
 * $_pagi_cuantos				OPCIONAL.		Entero. Cantidad de registros que contendr� como m�ximo cada p�gina.
								Por defecto est� en 20.
											
 * $_pagi_nav_num_enlaces		OPCIONAL		Entero. Cantidad de enlaces a los n�meros de p�gina que se mostrar�n como 
								m�ximo en la barra de navegaci�n.
								Por defecto se muestran todos.
											
 * $_pagi_mostrar_errores		OPCIONAL		Booleano. Define si se muestran o no los errores de MySQL que se puedan producir.
 								Por defecto est� en "true";
											
 * $_pagi_propagar				OPCIONAL		Array de cadenas. Contiene los nombres de las variables que se quiere propagar
								por el url. Por defecto se propagar�n todas las que ya vengan por el url (GET).
 * $_pagi_conteo_alternativo	OPCIONAL		Booleano. Define si se utiliza mysql_num_rows() (true) o COUNT(*) (false).
								Por defecto est� en false.
 * $_pagi_separador				OPCIONAL		Cadena. Cadena que separa los enlaces num�ricos en la barra de navegaci�n entre p�ginas.
 								Por defecto se utiliza la cadena " | ".
 * $_pagi_nav_estilo			OPCIONAL		Cadena. Contiene el nombre del estilo CSS para los enlaces de paginaci�n.
 								Por defecto no se especifica estilo.
 * $_pagi_nav_anterior			OPCIONAL		Cadena. Contiene lo que debe ir en el enlace a la p�gina anterior. Puede ser un tag <img>.
 								Por defecto se utiliza la cadena "&laquo; Anterior".
 * $_pagi_nav_siguiente			OPCIONAL		Cadena. Contiene lo que debe ir en el enlace a la p�gina siguiente. Puede ser un tag <img>.
 								Por defecto se utiliza la cadena "Siguiente &raquo;"
--------------------------------------------------------------------------
*/


/*
 * Verificaci�n de los par�metros obligatorios y opcionales.
 *------------------------------------------------------------------------
 */
 if(empty($_pagi_sql)){
	// Si no se defini� $_pagi_sql... grave error!
	// Este error se muestra s� o s� (ya que no es un error de mysql)
	die("<b>Error Paginator : </b>No se ha definido la variable \$_pagi_sql");
 }
 
 if(empty($_pagi_cuantos)){
	// Si no se ha especificado la cantidad de registros por p�gina
	// $_pagi_cuantos ser� por defecto 20
	$_pagi_cuantos = 20;
 }
 
 if(!isset($_pagi_mostrar_errores)){
	// Si no se ha elegido si se mostrar� o no errores
	// $_pagi_errores ser� por defecto true. (se muestran los errores)
	$_pagi_mostrar_errores = true;
 }

 if(!isset($_pagi_conteo_alternativo)){
	// Si no se ha elegido el tipo de conteo
	// Se realiza el conteo dese mySQL con COUNT(*)
	$_pagi_conteo_alternativo = false;
 }
 
 if(!isset($_pagi_separador)){
	// Si no se ha elegido un separador
	// Se toma el separador por defecto.
	$_pagi_separador = " | ";
 }
 
  if(isset($_pagi_nav_estilo)){
	// Si se ha definido un estilo para los enlaces, se genera el atributo "class" para el enlace
	$_pagi_nav_estilo_mod = "class=\"$_pagi_nav_estilo\"";
 }else{
 	// Si no, se utiliza una cadena vac�a.
 	$_pagi_nav_estilo_mod = "";
 }
 
 if(!isset($_pagi_nav_anterior)){
	// Si no se ha elegido una cadena para el enlace "siguiente"
	// Se toma la cadena por defecto.
	$_pagi_nav_anterior = "&laquo; Anterior";
 } 
 
 if(!isset($_pagi_nav_siguiente)){
	// Si no se ha elegido una cadena para el enlace "siguiente"
	// Se toma la cadena por defecto.
	$_pagi_nav_siguiente = "Siguiente &raquo;";
 } 
 
//------------------------------------------------------------------------


/*
 * Establecimiento de la p�gina actual.
 *------------------------------------------------------------------------
 */
 if (empty($_GET['_pagi_pg'])){
	// Si no se ha hecho click a ninguna p�gina espec�fica
	// O sea si es la primera vez que se ejecuta el script
    	// $_pagi_actual es la pagina actual-->ser� por defecto la primera.
	$_pagi_actual = 1;
 }else{
	// Si se "pidi�" una p�gina espec�fica:
	// La p�gina actual ser� la que se pidi�.
    	$_pagi_actual = $_GET['_pagi_pg'];
 }
//------------------------------------------------------------------------


/*
 * Establecimiento del n�mero de p�ginas y del total de registros.
 *------------------------------------------------------------------------
 */
 // Contamos el total de registros en la BD (para saber cu�ntas p�ginas ser�n)
 // La forma de hacer ese conteo depender� de la variable $_pagi_conteo_alternativo
 if($_pagi_conteo_alternativo == false){
 	$_pagi_sqlConta = eregi_replace("select (.*) from", "SELECT COUNT(*) FROM", $_pagi_sql);
 	$_pagi_result2 = mysql_query($_pagi_sqlConta);
	// Si ocurri� error y mostrar errores est� activado
 	if($_pagi_result2 == false && $_pagi_mostrar_errores == true){
		die (" Error en la consulta de conteo de registros: $_pagi_sqlConta. Mysql dijo: <b>".mysql_error()."</b>");
 	}
 	$_pagi_totalReg = mysql_result($_pagi_result2,0,0);//total de registros
 }else{
	$_pagi_result3 = mysql_query($_pagi_sql);
	// Si ocurri� error y mostrar errores est� activado
 	if($_pagi_result3 == false && $_pagi_mostrar_errores == true){
		die (" Error en la consulta de conteo alternativo de registros: $_pagi_sql. Mysql dijo: <b>".mysql_error()."</b>");
 	}
	$_pagi_totalReg = mysql_num_rows($_pagi_result3);
 }
 // Calculamos el n�mero de p�ginas (saldr� un decimal)
 // con ceil() redondeamos y $_pagi_totalPags ser� el n�mero total (entero) de p�ginas que tendremos
 $_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);

//------------------------------------------------------------------------


/*
 * Propagaci�n de variables por el URL.
 *------------------------------------------------------------------------
 */
 // La idea es pasar tambi�n en los enlaces las variables hayan llegado por url.
 $_pagi_enlace = $_SERVER['PHP_SELF'];
 
 
 $_pagi_query_string = "?";
 
 if(!isset($_pagi_propagar)){
 	//Si no se defini� qu� variables propagar, se propagar� todo el $_GET (por compatibilidad con versiones anteriores)
	$_pagi_propagar = array_keys($_GET);
 }elseif(!is_array($_pagi_propagar)){
	// si $_pagi_propagar no es un array... grave error!
	die("<b>Error Paginator : </b>La variable \$_pagi_propagar debe ser un array");
 }
 // Este foreach est� tomado de la Clase Paginado de webstudio
 // (http://www.forosdelweb.com/showthread.php?t=65528)
 foreach($_pagi_propagar as $var){
 	if(isset($GLOBALS[$var])){
		// Si la variable es global al script
		$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
	}elseif(isset($_REQUEST[$var])){
		// Si no es global (o register globals est� en OFF)
		$_pagi_query_string.= $var."=".$_REQUEST[$var]."&";
	}
 }

 // A�adimos el query string a la url.
 $_pagi_enlace .= $_pagi_query_string;
// echo "<p>_pagi_enlace = $_pagi_enlace</p>";
//------------------------------------------------------------------------


//MIGUEL esto lo hago para saber si estoy en una p�gina con el htaccess. 
//porque entonces la propagacion de las variables para los enlaces de paginacion seria distinta
if (!$_pagi_htaccess){



	/*
	 * Generaci�n de los enlaces de paginaci�n.
	 *------------------------------------------------------------------------
	 */
	 // La variable $_pagi_navegacion contendr� los enlaces a las p�ginas.
	 $_pagi_navegacion_temporal = array();
	 if ($_pagi_actual != 1){
		// Si no estamos en la p�gina 1. Ponemos el enlace "anterior"
		$_pagi_url = $_pagi_actual - 1; //ser� el n�mero de p�gina al que enlazamos
		$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_anterior</a>";
	 }
	 
	 // La variable $_pagi_nav_num_enlaces sirve para definir cu�ntos enlaces con 
	 // n�meros de p�gina se mostrar�n como m�ximo.
	 // Ojo: siempre se mostrar� un n�mero impar de enlaces. M�s info en la documentaci�n.
	 
	 if(!isset($_pagi_nav_num_enlaces)){
		// Si no se defini� la variable $_pagi_nav_num_enlaces
		// Se asume que se mostrar�n todos los n�meros de p�gina en los enlaces.
		$_pagi_nav_desde = 1;//Desde la primera
		$_pagi_nav_hasta = $_pagi_totalPags;//hasta la �ltima
	 }else{
		// Si se defini� la variable $_pagi_nav_num_enlaces
		// Calculamos el intervalo para restar y sumar a partir de la p�gina actual
		$_pagi_nav_intervalo = ceil($_pagi_nav_num_enlaces/2) - 1;
		
		// Calculamos desde qu� n�mero de p�gina se mostrar�
		$_pagi_nav_desde = $_pagi_actual - $_pagi_nav_intervalo;
		// Calculamos hasta qu� n�mero de p�gina se mostrar�
		$_pagi_nav_hasta = $_pagi_actual + $_pagi_nav_intervalo;
		
		// Ajustamos los valores anteriores en caso sean resultados no v�lidos
		
		// Si $_pagi_nav_desde es un n�mero negativo
		if($_pagi_nav_desde < 1){
			// Le sumamos la cantidad sobrante al final para mantener el n�mero de enlaces que se quiere mostrar. 
			$_pagi_nav_hasta -= ($_pagi_nav_desde - 1);
			// Establecemos $_pagi_nav_desde como 1.
			$_pagi_nav_desde = 1;
		}
		// Si $_pagi_nav_hasta es un n�mero mayor que el total de p�ginas
		if($_pagi_nav_hasta > $_pagi_totalPags){
			// Le restamos la cantidad excedida al comienzo para mantener el n�mero de enlaces que se quiere mostrar.
			$_pagi_nav_desde -= ($_pagi_nav_hasta - $_pagi_totalPags);
			// Establecemos $_pagi_nav_hasta como el total de p�ginas.
			$_pagi_nav_hasta = $_pagi_totalPags;
			// Hacemos el �ltimo ajuste verificando que al cambiar $_pagi_nav_desde no haya quedado con un valor no v�lido.
			if($_pagi_nav_desde < 1){
				$_pagi_nav_desde = 1;
			}
		}
	 }

	 for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde p�gina 1 hasta �ltima p�gina ($_pagi_totalPags)
		if ($_pagi_i == $_pagi_actual) {
			// Si el n�mero de p�gina es la actual ($_pagi_actual). Se escribe el n�mero, pero sin enlace y en negrita.
			$_pagi_navegacion_temporal[] = "<span ".$_pagi_nav_estilo_mod.">$_pagi_i</span>";
		}else{
			// Si es cualquier otro. Se escibe el enlace a dicho n�mero de p�gina.
			$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_i."'>".$_pagi_i."</a>";
		}
	 }
	
	 if ($_pagi_actual < $_pagi_totalPags){
		// Si no estamos en la �ltima p�gina. Ponemos el enlace "Siguiente"
		$_pagi_url = $_pagi_actual + 1; //ser� el n�mero de p�gina al que enlazamos
		$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_siguiente</a>";
	 }
	 $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);

	 
	 
	 
	 
}else{
	//ESTOY EN UN HTACCESS
	//MIGUEL voy a propagar las variables de paginaci�n de una manera distinta
	// La variable $_pagi_navegacion contendr� los enlaces a las p�ginas.
	//echo "<p>_pagi_enlace = $_pagi_enlace</p>";
	 if (isset($_pagi_htaccess_termina_html)){
	 	$_pagi_enlace = substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],".html"));
		$_pagi_ext_terminacion = "html";
	 }else{
	 	if (strpos($_pagi_enlace,"index.php")===false){
			$_pagi_enlace = substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],".php"));
			$_pagi_ext_terminacion = "php";
			//echo "<p>_pagi_enlacex = $_pagi_enlace</p>";
		}else{
			$_pagi_enlace = "index";
			$_pagi_ext_terminacion = "php";
		}
	 }
	 //voy a ver si tenemos un pg_x porque esto no me interesa que est� en la variable $_pagi_enlace
	 if (strpos($_pagi_enlace,"_pg"))
	 	$_pagi_enlace = substr($_pagi_enlace,0,strpos($_pagi_enlace,"_pg"));
	// echo "<p>_pagi_enlace = $_pagi_enlace</p>";
	
	 $_pagi_navegacion_temporal = array();
	 if ($_pagi_actual != 1){
		// Si no estamos en la p�gina 1. Ponemos el enlace "anterior"
		$_pagi_url = $_pagi_actual - 1; //ser� el n�mero de p�gina al que enlazamos
		if ($_pagi_url!=1)
			$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_url."." . $_pagi_ext_terminacion . "'>$_pagi_nav_anterior</a>";
		else
			$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."." . $_pagi_ext_terminacion . "'>$_pagi_nav_anterior</a>";
	 }
	 
	 // La variable $_pagi_nav_num_enlaces sirve para definir cu�ntos enlaces con 
	 // n�meros de p�gina se mostrar�n como m�ximo.
	 // Ojo: siempre se mostrar� un n�mero impar de enlaces. M�s info en la documentaci�n.
	 
	// ASUMO QUE no se defini� la variable $_pagi_nav_num_enlaces
	// Se asume que se mostrar�n todos los n�meros de p�gina en los enlaces.
	$_pagi_nav_desde = 1;//Desde la primera
	$_pagi_nav_hasta = $_pagi_totalPags;//hasta la �ltima
	 
	 for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde p�gina 1 hasta �ltima p�gina ($_pagi_totalPags)
		if ($_pagi_i == $_pagi_actual) {
			// Si el n�mero de p�gina es la actual ($_pagi_actual). Se escribe el n�mero, pero sin enlace y en negrita.
			$_pagi_navegacion_temporal[] = "<span ".$_pagi_nav_estilo_mod.">$_pagi_i</span>";
		}else{
			// Si es cualquier otro. Se escibe el enlace a dicho n�mero de p�gina.
			if ($_pagi_i!=1)
				$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_i."." . $_pagi_ext_terminacion . "'>".$_pagi_i."</a>";
			else
				$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."." . $_pagi_ext_terminacion . "'>".$_pagi_i."</a>";
		}
	 }
	
	 if ($_pagi_actual < $_pagi_totalPags){
		// Si no estamos en la �ltima p�gina. Ponemos el enlace "Siguiente"
		$_pagi_url = $_pagi_actual + 1; //ser� el n�mero de p�gina al que enlazamos
		$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_url."." . $_pagi_ext_terminacion . "'>$_pagi_nav_siguiente</a>";
	 }
	 $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);
}
//------------------------------------------------------------------------


/*
 * Obtenci�n de los registros que se mostrar�n en la p�gina actual.
 *------------------------------------------------------------------------
 */
 // Calculamos desde qu� registro se mostrar� en esta p�gina
 // Recordemos que el conteo empieza desde CERO.
 $_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;
 
 // Consulta SQL. Devuelve $cantidad registros empezando desde $_pagi_inicial
 $_pagi_sqlLim = $_pagi_sql." LIMIT $_pagi_inicial,$_pagi_cuantos";
 $_pagi_result = mysql_query($_pagi_sqlLim);
 // Si ocurri� error y mostrar errores est� activado
 if($_pagi_result == false && $_pagi_mostrar_errores == true){
 	die ("Error en la consulta limitada: $_pagi_sqlLim. Mysql dijo: <b>".mysql_error()."</b>");
 }

//------------------------------------------------------------------------


/*
 * Generaci�n de la informaci�n sobre los registros mostrados.
 *------------------------------------------------------------------------
 */
 // N�mero del primer registro de la p�gina actual
 $_pagi_desde = $_pagi_inicial + 1;
 
 // N�mero del �ltimo registro de la p�gina actual
 $_pagi_hasta = $_pagi_inicial + $_pagi_cuantos;
 if($_pagi_hasta > $_pagi_totalReg){
 	// Si estamos en la �ltima p�gina
	// El ultimo registro de la p�gina actual ser� igual al n�mero de registros.
 	$_pagi_hasta = $_pagi_totalReg;
 }
 
 $_pagi_info = " <span class=fuente8><b>Se muestran desde el $_pagi_desde hasta el $_pagi_hasta de un total de $_pagi_totalReg p�ginas</b></span>";
 $_pagi_info_scripts = " <span class=fuente8><b>Encontrados $_pagi_totalReg scripts. Se muestran desde el $_pagi_desde hasta el $_pagi_hasta.</b></span>";
 $_pagi_info_articulos = " <span class=fuente8><b>Encontrados $_pagi_totalReg art�culos. Se muestran desde el $_pagi_desde hasta el $_pagi_hasta.</b></span>";
//------------------------------------------------------------------------


/**
 * Variables que quedan disponibles despu�s de incluir el script v�a include():
 * ------------------------------------------------------------------------
 
 * $_pagi_result		Identificador del resultado de la consulta a la BD para los registros de la p�gina actual. 
 				Listo para ser "pasado" por una funci�n como mysql_fetch_row(), mysql_fetch_array(), 
				mysql_fetch_assoc(), etc.
							
 * $_pagi_navegacion		Cadena que contiene la barra de navegaci�n con los enlaces a las diferentes p�ginas.
 				Ejemplo: "<<anterior 1 2 3 4 siguiente>>".
							
 * $_pagi_info			Cadena que contiene informaci�n sobre los registros de la p�gina actual.
 				Ejemplo: "desde el 16 hasta el 30 de un total de 123";				

*/
?>