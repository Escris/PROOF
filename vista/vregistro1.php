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
     function Duplicidad(Id){
      var doc = {
                "Id" : Id
        };
        $.ajax({
                data:  doc,
                url:   'vista/vduplicidad.php',
                type:  'post',
                success:  function (response) {
                        $("#reloadunicipio").html(response);
                }
        });
     }
</script>

<center>
<form name="form1" action="" method="post" >

<table align="center" width="950" height="500" border="0" cellspacing="5" cellpadding="3" style="background:white">
  <tr>
    <td colspan=5 align="center"><h1>Registro</h1></td>
     <?php 
    date_default_timezone_set('America/Bogota');
    $hoy = strftime("%Y-%m-%d");
    ?>
    <td><input type="hidden" value="<?php echo $hoy ?>" name="fechadeinicio" id="fechadeinicio" /></td>
  </tr>
  <tr>
    <td valign="bottom">
    <div id="reloadunicipio"></div>
    <div align="left" id="2" class="rojo">*&nbsp;Tipo de Documento:</div>
<select name="tdocapre" style="width: 195px;" onblur="probar(id='tdocapre', 2)" required>
    <option id="tdocapre" value="">Seleccione</option>
                    <?php 
                            //Select
                            $dat3 = $ins->selpara(1);
                            for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php echo $dat3[$i]['codval'] ?>"><?php echo $dat3[$i]['nomval'] ?></option>
                        <?php } ?>
          </select>
    </td>
    <td valign="bottom"><div align="left" id="1" class="rojo">*</div>
    <input type="text" name="ndocapre" size="25" maxlength="11" id="ndocapre" required="required" placeholder="Documento" onchange="probar1(id='ndocapre', 1)" onblur="javascript:Duplicidad(this.value);" onkeypress="return validar(event)" /></td>
    <td valign="bottom">
    <div align="left" id="3" class="rojo">*&nbsp;Estado Civil:</div>
          <select name="estcapre" title="Estado Civil" onblur="probar(id='estcapre', 3)" required>
              <option value=""  id="estcapre">Seleccione</option>
                    <?php 
                            //Select
                            $dat4 = $ins->selpara(3);
                            for ($i=0; $i < count($dat4); $i++){
                         ?>
                            <option value="<?php echo $dat4[$i]['codval'] ?>"><?php echo $dat4[$i]['nomval'] ?></option>
                        <?php } ?>
                    </select></td>
  </tr>
  <tr>
    <td valign="bottom"><div align="left" id="4" class="rojo">*</div>
    <input type="text" name="nomapre" size="25" maxlength="30" required="required" placeholder="Nombre" id="nomapre" onblur="probar1(id='nomapre', 4)"/></td>
    <td valign="bottom"><div align="left" id="5" class="rojo">*</div>
    <input type="text" name="apeapre" size="25" maxlength="30" required="required" placeholder="Apellido" id="apeapre" onblur="probar1(id='apeapre', 5)"/></td>
    <td valign="bottom"><div align="left" id="26" class="rojo">*&nbsp;Tipo de Sangre:</div>
    <select name="sangre" title="Tipo de Sangre" onblur="probar(id='sangre', 26)" required>
          <option value="" id="sangre">Seleccione</option>
        <?php 
                //Select
                $dat2 = $ins->selpara(8);
                for ($i=0; $i < count($dat2); $i++){
             ?>
                <option value="<?php echo $dat2[$i]['codval'] ?>"><?php echo $dat2[$i]['nomval'] ?></option>
            <?php } ?>
        </select>
    </td>   
  </tr>
  <tr>
    <td valign="bottom"><div align="left" id="6" class="rojo">*&nbsp;Fecha de Nacimiento:</div>
    <input type="date" name="fenaapre" size="25"  maxlength="30" required="required" id="fenaapre" onblur="probar1(id='fenaapre', 6)"/>
    <div><span>&nbsp;&nbsp;<?php echo "Dia - Mes - A&ntilde;o" ?></span></div>
    </td>
    <td valign="bottom"><div align="left" id="7" class="rojo">*</div>
     <input type="text" name="telapre" size="25"  maxlength="30" required="required" placeholder="Tel&eacute;fono" id="telapre" onblur="probar1(id='telapre', 7)"/>
    <div><input type="checkbox" name="telef" onclick="ver_password();">¿Tiene otro Numero?</input></div>
    </td>
    <td valign="bottom"><div align="left" id="8" class="rojo">*</div>
    <input type="email" name="emaapre" size="27" maxlength="30" required="required" placeholder="E-mail" id="emaapre" onblur="probar1(id='emaapre', 8)" />
    <div><input type="checkbox" name="e" onclick="email();">¿Tiene otro E-mail?</input></div>
    </td>
  </tr>
  <tr>
  <td><div id="espacio"></div></td>
  <td><div id="phon"></div></td>
  <td><div id="correo"></div></td>
  </tr>
  <tr>
    <td valign="bottom"><div align="left" id="9" class="rojo">*</div>
    <input type="text" name="dirapre" size="27" maxlength="30" required="required" placeholder="Direcci&oacute;n" id="dirapre" onblur="probar1(id='dirapre', 9)"/></td>
    <td valign="bottom">
    <div align="left" id="10" class="rojo">*&nbsp;Departamento:</div>
        <select name="depto" onchange="javascript:RecargarCiudades(this.value);" style="width: 195px;" onblur="probar(id='depto', 10)" required>
            <option value="" id="depto">Seleccione</option>
            <?php 
                //Select
                $dat5 = $ins->selubi();
                for ($i=0; $i < count($dat5); $i++){
             ?>
                <option value="<?php echo $dat5[$i]['codubi'] ?>"><?php echo $dat5[$i]['nomubi'] ?></option>
            <?php } ?>
        </select>
    </td>
    <td valign="bottom">
        <div id="reloadMunicipio"></div>
    </td>
  </tr>
  <tr>
    <td valign="bottom"><input type="text" name="nlmiapre" size="27"  maxlength="30"  placeholder="Numero de la Libreta Militar"/></td>
    <td valign="bottom"><div align="left" id="20" class="rojo">*</div>
    <input type="password" name="pass" id="contraseña" size="27"  maxlength="30" required="required" placeholder="Contrase&ntilde;a de Minimo 8 caracteres" onblur="vali(id='contraseña', 20)" />
    </td>
    <td valign="bottom">
    <input type="password" name="pass1" size="27" id="confirmar"  maxlength="30" onblur="comparar()" required="required" placeholder="Confirmar Contrase&ntilde;a"/></td>
  </tr>
  <tr>
    <td valign="bottom">
    <div align="left" id="14" class="rojo">*&nbsp;Genero:</div>
        <select name="genapre" style="width: 195px;" onblur="probar(id='genapre', 14)" required>
          <option value="" id="genapre">Seleccione</option>
        <?php 
                //Select
                $dat2 = $ins->selpara(2);
                for ($i=0; $i < count($dat2); $i++){
             ?>
                <option value="<?php echo $dat2[$i]['codval'] ?>"><?php echo $dat2[$i]['nomval'] ?></option>
            <?php } ?>
        </select>
    </td>
    <td valign="bottom">
     <div align="left" id="15" class="rojo">*&nbsp;Nombre del programa:</div>
        <select name="programa" onchange="javascript:RecargarProgramas(this.value);" style="width: 195px;" onblur="probar(id='programa', 15, 16)" required>
            <option value="" id="programa">Seleccione</option>
            <?php 
                //Select
                $dat11 = $ins->selprograma();
                for ($i=0; $i < count($dat11); $i++){
             ?>
                <option value="<?php echo $dat11[$i]['codpro'] ?>"><?php echo $dat11[$i]['nompro'] ?></option>
            <?php } ?>
         </select>
  </td>
  <td valign="bottom">
          <div id="reloadPrograma"></div>
  </td>
    <td valign="bottom">&nbsp;</td>
  </tr>
  <tr>
  <td valign="bottom">&nbsp;</td>
  <td valign="bottom"><div align="left" id="12" class="rojo">*</div>
    <input type="text" name="llamaapre" size="27"  maxlength="30" required="required" placeholder="Familiar del aprendiz" id="llamaapre" onblur="probar1(id='llamaapre', 12)"/>
    </td>
  <td valign="bottom"><div align="left" id="13" class="rojo">*</div>
    <input type="text" name="teleapre" size="25"  maxlength="30" required="required" placeholder="Tel&eacute;fono del Contacto" id="teleapre" onblur="probar1(id='teleapre', 13)"/>
    </td>    
  </tr>
  <tr>
    <td>
    <div class="nota" >NOTA: los campos con asteriscos son</div>
    <div class="nota" >¡Obligatorios!</div>
    </td>
  </tr>


<?php if($perusu==1){ ?>
  <tr>
    <td valign="bottom">&nbsp;</td>
    <td valign="bottom">&nbsp;</td>
    <td valign="bottom"><div align="left" id="18" class="rojo">*&nbsp;Perfil:</div>
        <select name="idper" id="idper" onblur="probar(id='idper', 18)" required>
          <option value= "">seleccione</option>
            <?php 
                for ($i=0; $i < count($dat1); $i++){
             ?>
                <option value="<?php echo $dat1[$i]['idper'] ?>" selected="selected"><?php echo $dat1[$i]['nomper'] ?></option>
            <?php } ?>
        </select>
     </td>
  </tr>
<?php }else{
    echo "<input type='hidden' name='idper' value='2' />";
  } ?>
    <tr>
        <td colspan="5" align="center" valign="bottom">
            <input id="boton1" type="submit" value="Guardar" />
            <input id="boton1" type="button" value="volver" onclick="location='index.php'" />
        </td>
    </tr>
</table>
</table>
</form>
</center>


<!--FUNCIONES JAVASCRIPT-->
    <script type="text/javascript">
      function ver_password() {
        document.getElementById('espacio').innerHTML = (document.form1.telef.checked) ? '<td valign="bottom">&nbsp;</td>' : '';
       

        document.getElementById('phon').innerHTML = (document.form1.telef.checked)
          ? '<input type="text" name="telefono" size="25"  maxlength="30" placeholder="Tel&eacute;fono Adicional" id="telefono" />': '';

        
    }
      function email(){
         document.getElementById('espacio').innerHTML = (document.form1.e.checked) ? '<td valign="bottom">&nbsp;</td>' : '';

         document.getElementById('correo').innerHTML = (document.form1.e.checked)      
          ? '<input type="email" name="emails" size="25"  maxlength="30" placeholder="E-mail Adicional" id="emails" />': '';
      }

    var x = document.getElementById("contraseña");
    var z = document.getElementById("confirmar");
    function comparar(){
    if (z.value != "") {
    if (x.value != z.value) {
      x.className = "box";
      z.className = "box";
      alert("Las contrase\u00f1\as no concuerdan");
    }else{
      x.className = "bax";
      z.className = "bax";
    };
    }else{

    };
  };
 function probar1(A, B){
  var msj = document.getElementById(A);
  var div = document.getElementById(B);
      if (msj.value != "") {
        div.className = "verde";
      }else{
        div.className = "rojo";
      }
    } 
    var doc = document.getElementById("contraseña");
    function vali(A, M){
  var msj = document.getElementById(A);
  var div = document.getElementById(M);
      if (doc.value != "") {
        if(doc.value.length < 8){
          alert("La Contrase\u00f1\a debe tener m\u00e1\s de 8 digitos.");
          div.className = "rojo";
          doc.className = "box";
        }else{
          div.className = "verde";
          doc.className = "bax";
        }
      }else{}
    }
    function probar(A, B){
  var msj = document.getElementById(A);
  var div = document.getElementById(B);
  
      if (msj.value != 0) {
        div.className = "verde"; 
      }else{
        div.className = "rojo"; 
      }
    } 
    function validar(text){
           tecla = text.which || text.keyCode;
           patron = /\d/; 
           te = String.fromCharCode(tecla);
           return (patron.test(te) || tecla == 9 || tecla == 8);
    }
    </script> 
