<?php
include ("controlador/cregistro.php");
?>  
<center>
<table width="700" border="0" cellspacing="5" cellpadding="3">
<tr><h1>Editar Registro de los Usuarios</h1></tr>
<tr>
  <td align="center">
      Ingrese el numero de documento del aprendiz
  </td>
</tr>
<tr>
  <td align="center">
     <input type="text" name="doc" id="doc" size="17" maxlength="20" required="required" placeholder="Numero del Documento"  />
  </td>
</tr>
<tr>
  <td align="center">
    <input type="button" value="Consultar" onclick="javascript:Tabla(document.getElementById('doc').value);Botones(document.getElementById('doc').value)" />
  </td>
</tr>
</table>
<form action="home.php?pac=125" method="post">
<div id="aprende"></div>
<div id="botones"></div>
</form>
</center>
<script language="javascript">
  function Tabla(value){
    var parametros = {
                "valor" : value
        };
        $.ajax({
                data:  parametros,
                url:   'vista/Tablaaprendiz.php',
                type:  'post',
                success:  function (response) {
                        $("#aprende").html(response);
                }
        });
     }
     function Botones(docu){
     	document.getElementById('botones').innerHTML = "<input type='hidden' value="+docu+" name='documentox'/><br/><input type='submit' value='Editar'/>";
     }
</script>

