<?php
$perusu = isset($_SESSION["perfil"]) ? $_SESSION["perfil"]:NULL;
?>
<div class="smallwhitetext" style="padding:9px;">
<ul id="menus">
    
	<hr width="90%" />
    <?php if($perusu==2){ ?>
    <li><a href="home.php?pac=109">Inicio</a></li>
    <li><a href="home.php?pac=120">Datos del Aprendiz</a></li>
    <?php } ?>
    <?php if($perusu==1){ ?>
    <li><a href="home.php?pac=128">Inicio</a></li>
    <li><a>Registros</a>
            <ul>
            <li><a href="home.php?pac=101">Registre Usuarios</a></li>
            <li><a href="home.php?pac=124">Editar Registros</a></li>
            <li></li>
            </ul>
    </li>
	<hr width="90%" />
    <li><a href="home.php?pac=102">Parametro</a></li>
    <li><a href="home.php?pac=103">Ubicacion</a></li>
    <li><a href="home.php?pac=105">Programa</a></li>
    <li><a href="home.php?pac=106">Ficha</a></li>
    <li><a>Carga Masiva</a>
    <ul>
    		<li><a href="home.php?pac=112">Programa Masivo</a></li>
    		<li><a href="home.php?pac=113">Ficha Masiva</a></li>
    		<li><a href="home.php?pac=114">Aprendiz Masivo</a></li>
            <li></li>
    </ul>
    </li>
    <li><a href="home.php?pac=108">Encuestas</a></li>
    <?php } ?>
    <?php if($perusu==1){ ?>
    <li><a href="home.php?pac=111">Estadisticas</a></li>
    <?php } ?>
    <hr width="90%" />

</ul> 
</div>