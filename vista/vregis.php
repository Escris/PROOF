<?php
include ("controlador/cregistro.php");
?>
<script language="javascript" src="js/jquery-1.9.1.js"></script><!-- llamamos al JQuery-->
<script language="javascript">
  function RecargarCiudades(value){
    var parametros = {
                "valor" : value
        };
        $.ajax({
                data:  parametros,
                url:   'vista/vubica.php',
                type:  'post',
                success:  function (response) {
                        $("#reloadMunicipio").html(response);
                }
        });
     }
      function RecargarProgramas(values){
      var variable = {
        "variables" : values
      };
      $.ajax({
          data: variable,
          url: 'vista/vprograma-ficha.php',
          type: 'post',
          success: function (respuesta){
                  $("#reloadPrograma").html(respuesta);
          }
      });
     }
</script>


<center>
<form name="form1" action="home.php?pac=124" method="post" >
<table width="700" border="0" cellspacing="5" cellpadding="3">
  <tr>
    <td colspan=5 align="center"><h1>Datos del Usuario</h1></td>
  </tr>
  <tr>
    <td><h5>Fecha en que se Registro: <?php echo $dat34[0]['fechadeinicio'] ?></h5></td>
  </tr>
  <tr>
    <td valign="bottom">
    &nbsp;Tipo de Documento:<br />
<select name="tdocapre" style="width: 195px;">
                    <?php 
                            //Select
                            $dat3 = $ins->selpara(1);
                            for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php echo $dat3[$i]['codval'] ?>" <?php if($dat3[$i]['codval']==$dat34[0]['tdocapre']) echo 'selected'?>><?php echo $dat3[$i]['nomval']; ?></option>
                        <?php } ?>
          </select>
    </td>
    <td valign="bottom">Numero del Documento
      <div id="identi">
      <h5><?php echo $dat34[0]['ndocapre'] ?></h5>
      <input type="hidden" name="ndocapre" value="<?php echo $dat34[0]['ndocapre'] ?>"/>
      </div>
      <input type="hidden" name="ndocaprex" value="<?php echo $dat34[0]['ndocapre'] ?>"/>
      <input type="hidden" name="actu" value="actu" />
    </td>
    <td valign="bottom">&nbsp;Estado Civil:<br />
      <select name="estcapre" title="Estado Civil">
                    <?php 
                            //Select
                            $dat4 = $ins->selpara(3);
                            for ($i=0; $i < count($dat4); $i++){
                         ?>
        <option value="<?php echo $dat4[$i]['codval']?>" <?php if($dat34[0]['estcapre']==$dat4[$i]['codval']) echo 'selected';?>><?php echo $dat4[$i]['nomval']?></option>
                        <?php } ?>
      </select>
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
    <?php if($perusu==1){ ?>
        <div>
        <input type="checkbox" id="tpd" name="tpd" onclick="identificacion();">¿Desea cambiar el documento?</input>
        </div>
    <?php }else{
        echo "<input type='hidden' name='idper' value='2' />";
    } ?>
    </td>
    <td></td>
  </tr>
  <tr>
    <td valign="bottom">&nbsp;Nombres :<br /><input type="text" name="nomapre" size="25" maxlength="30" value="<?php echo $dat34[0]['nomapre'] ?>"/></td>
    <input name="pac" type="hidden" id="pac" value="120" /></td>
    <td valign="bottom">&nbsp;Apellidos :<br/><input type="text" name="apeapre" size="25" maxlength="30"  value="<?php echo $dat34[0]['apeapre'] ?>"/></td>
    <td valign="bottom">&nbsp;Numero de la Libreta Militar :<br/><input type="text" name="nlmiapre" size="25" maxlength="30"  value="<?php echo $dat34[0]['nlmiapre'] ?>"/></td>
  </tr>
  <tr>
    <td valign="bottom">&nbsp;Fecha de Nacimiento:<br />
    <input type="date" name="fenaapre" size="25" maxlength="30"  value="<?php echo $dat34[0]['fenaapre'] ?>"/>
    </td>
     <td valign="bottom">&nbsp;Telefono :
     <input type="text" name="telapre" size="25" maxlength="30" id="telapre" value="<?php echo $dat34[0]['telapre'] ?>" />
    </td>
    <td valign="bottom">&nbsp;Correo Electronico:
    <input type="email" name="emaapre" size="27" maxlength="30" id="emaapre" value="<?php echo $dat34[0]['emaapre'] ?>" />
    </td>
  </tr>
  <tr>
    <td valign="bottom">&nbsp;Tipo de Sangre:<br />
        <select name="sangre">
        <?php 
                //Select
                $dat19 = $ins->selpara(8);
                for ($i=0; $i < count($dat19); $i++){
             ?>
                <option value="<?php echo $dat19[$i]['codval'] ?>" <?php if($dat34[0]['sangre']==$dat19[$i]['codval']) echo 'selected';?>><?php echo $dat19[$i]['nomval'] ?></option>
            <?php } ?>
        </select>
    </td>
    <td valign="bottom">&nbsp;Telefono Adicional:<input type="text" name="telefono" size="25" maxlength="30" id="telefono" value="<?php echo $dat34[0]['telefono'] ?>"</td>
     <td valign="bottom">&nbsp;Correo Electronico Adicional:<input type="email" name="emails" size="25" maxlength="30" value="<?php echo $dat34[0]['email'] ?>" id="emails" /></td>
  </tr>
  <tr>
    <td valign="bottom">&nbsp;Direcci&#243;n :
    <input type="text" name="dirapre" size="25" maxlength="30" value="<?php echo $dat34[0]['dirapre'] ?>"/></td>
    <td valign="bottom">&nbsp;Departamento:<br />
        <select name="depto" onchange="javascript:RecargarCiudades(this.value);" style="width: 195px;">
            <?php 
                //Select
                $dat5 = $ins->selubi();
                for ($i=0; $i < count($dat5); $i++){
             ?>
                <option value="<?php echo $dat5[$i]['codubi'] ?>" <?php if($dat5[$i]['codubi']==substr($dat34[0]['codubi'], 0,-3)) echo 'selected' ?>><?php echo $dat5[$i]['nomubi'] ?></option>
            <?php } ?>
        </select>
    </td>
    <td valign="bottom">
        <div id="reloadMunicipio">&nbsp;Ciudad :<br />
        <select name="codubi" style="width: 195px;">
        <?php 
                //Select
                $dat15 = $ins->selubiciudad();
                for ($i=0; $i < count($dat15); $i++){
             ?>
                <option value="<?php echo $dat15[$i]['codubi'] ?>" <?php if($dat15[$i]['codubi']== $dat34[0]['codubi']) echo 'selected' ?> ><?php echo $dat15[$i]['nomubi'] ?></option>
                <?php } ?>
        </select>
        </div>
    </td>
  </tr>
  <tr>
    <td valign="bottom"><br />&nbsp;Familiar del Aprendiz :
    <input type="text" name="llamaapre" size="23" maxlength="30" value="<?php echo $dat34[0]['llamaapre'] ?>"/>
    </td>
    <td valign="bottom">&nbsp;Tel&#233;fono del Familiar : 
    <input type="text" name="teleapre" size="23" maxlength="30" value="<?php echo $dat34[0]['teleapre'] ?>"/>
    </td>
    <td valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom">&nbsp;Genero:<br />
        <select name="genapre" style="width: 195px;">
        <?php 
                //Select
                $dat2 = $ins->selpara(2);
                for ($i=0; $i < count($dat2); $i++){
             ?>
                <option value="<?php echo $dat2[$i]['codval'] ?>" <?php if($dat34[0]['genapre']==$dat2[$i]['codval']) echo 'selected';?>><?php echo $dat2[$i]['nomval'] ?></option>
            <?php } ?>
        </select>
    </td>
    <td valign="bottom">&nbsp;Nombre del Programa:<br />
        <select name="programa" style="width: 195px;" onchange="javascript:RecargarProgramas(this.value);">
            <?php 
                //Select
                $dat111 = $ins->selprograma();
                $dat192 = $ins->selfichapro($dat34[0]['nfic']);
                for ($i=0; $i < count($dat111); $i++){
             ?>
                <option value="<?php echo $dat111[$i]['codpro'] ?>" <?php if($dat192[0]['codpro']==$dat111[$i]['codpro']) echo 'selected';?>><?php echo $dat111[$i]['nompro'] ?></option>
            <?php } ?>
         </select>
  </td>
  <td valign="bottom"><div id="reloadPrograma">&nbsp;Numero de la Ficha:<br />
        <select name="nfic" style="width: 195px;">
            <?php 
                //Select
                $dat11 = $ins->selficha();
                for ($i=0; $i < count($dat11); $i++){
             ?>
                <option value="<?php echo $dat11[$i]['nfic'] ?>" <?php if($dat34[0]['nfic']==$dat11[$i]['nfic']) echo 'selected';?>><?php echo $dat11[$i]['nfic'] ?></option>
            <?php } ?>
         </select></div>
  </td>
    <td valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" valign="bottom">&nbsp;</td>
  </tr>
  <tr>
  <td valign="bottom">&nbsp;</td>
    <td valign="bottom"><br />
    <span id="passwd_sitio">
    <input type="password" name="pass" size="27" id="contraseña" maxlength="30" value="<?php echo $dat34[0]['pass'] ?>"/>
    </span>
    </td>
    <td valign="bottom">
    <input type="password" name="pass1" size="27" id="confirmar" maxlength="30" onblur="comparar()" placeholder="Confirmar Contrase&ntilde;a"/>
    </td>
  </tr>
  <tr>
   <td valign="bottom">&nbsp;</td>
    <td>
        <input type="checkbox" name="input_ver" value="ver" onclick="ver_password();" />Mostrar Caracteres&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
  </tr>

<?php if($perusu==1){ ?>
  <tr>
    <td valign="bottom">&nbsp;</td>
    <td valign="bottom">&nbsp;</td>
    <td valign="bottom">&nbsp;Perfil:<br />
        <select name="idper">
            <?php 
                for ($i=0; $i < count($dat1); $i++){
             ?>
                <option value="<?php echo $dat1[$i]['idper'] ?>" <?php if($dat34[0]['idper']==$dat1[$i]['idper']) echo 'selected';?>><?php echo $dat1[$i]['nomper'] ?></option>
            <?php } ?>
        </select>
     </td>
  </tr>
<?php }else{
    echo "<input type='hidden' name='idper' value='2' />";
  } ?>
    <tr>
        <td colspan="5" align="center" valign="bottom">
            <input id="boton1" type="submit" value="Guardar"/>
        </td>
    </tr>
</table>
</form>
</center>

<!--FUNCIONES JAVA-->
     <script type="text/javascript">
        function ver_password() {
        var passwd_valor = document.form1.pass.value;
     
        document.getElementById('passwd_sitio').innerHTML = (document.form1.input_ver.checked)
            ? '<input type="text"     name="pass" value="<?php echo $dat34[0]['pass'] ?>">'
            : '<input type="password" name="pass" value="<?php echo $dat34[0]['pass'] ?>">'
            ;
     
        document.form1.pass.value = passwd_valor;
    }
    var x = document.getElementById("contraseña");
    var z = document.getElementById("confirmar");
    function comparar(){
    if (x.value != z.value) {
      x.className = "box";
      z.className = "box";
      alert("Las contrase\u00f1\as no concuerdan");
    }else{
      x.className = "bax";
      z.className = "bax";
    };
  };
    function identificacion(){
       var valor = document.form1.ndocapre.value;
     
        document.getElementById('identi').innerHTML = (document.form1.tpd.checked)
            ? '<input type="text"  name="ndocapre" value="<?php echo $dat34[0]['ndocapre'] ?>">'
            : '<h5><?php echo $dat34[0]['ndocapre'] ?></h5><input type="hidden" name="ndocapre" value="<?php echo $dat34[0]['ndocapre'] ?>">'
            ;
     
        document.form1.ndocapre.value = valor;
    }
    </script>