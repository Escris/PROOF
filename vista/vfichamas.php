<center>
<?php include ("controlador/cfichamas.php"); ?>
<form action="home.php?pac=113" method="post" enctype="multipart/form-data">
    <span class="TextoTitulo">INGRESO MASIVO DE FICHAS</span><br/><br/><br/>
    <center><b>Por favor primero seleccione el archivo de sof&iacute;a plus (P04)</b>
    <center><b>y despu&eacute;s cargue el archivo :</b>  </br></br>
    <input name="archivo" id="boton4" type="file" size="35" />
    <input id="boton3" name="enviar" type="submit" value="Cargar Archivos" />
    <input name="action" type="hidden" value="upload" />
    <img src="image/precarga.gif" width="1" height="1">
</form>
</br></br></br></br>
<form name="form2">
<a href="archivo/Ficha.xlsx" style="font-size:12px; text-decoration:none; color:black; font-weight:bold">Descargar Plantilla<br/><br/><img src="image/excel.gif"/></a>
</br></br></br
<table width="500px" height="300px">
<tr>
<td>
<img src="image/ficha.png"/>
</td>
</tr>
</form>
</center>