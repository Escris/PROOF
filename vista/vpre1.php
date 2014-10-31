
<?php
include ("controlador/cpre1.php");
?>

<title>Pregunta</title>
<body>
<center>
    <table width="381">
        <tr>
            <td width="145" align="left"><span class="style1">Nombre Encuesta:</span></td>
            <td width="224"><b><?php echo $encuesta[0]['nombre'] ?></b></td>

        </tr>
        <!--<tr>
            <td width="145" align="left"><span class="style1">Cod. Encuesta:</span></td>
            <td width="224"><?php echo $encuesta[0]['noenc'] ?></td>

        </tr>-->
        <tr>
            <td align="left">Fecha Inicio:</td>
            <td width="224"><?php echo $encuesta[0]['fecinienc'] ?>
            </td>
        </tr>
        <tr>
            <td>Fecha Fin:</td>
            <td><?php echo $encuesta[0]['fecfinenc'] ?></td>
        </tr>
    </table>
        <img src="image/preguntas.png" alt="" width="141" height="45" align="top"> 

<script>
        function fnTipoPreguntas(val){
            if (val == '24') {
                document.getElementById('canrespre').readOnly = true;
                document.getElementById('canrespre').value = 2;
            }else if(val=='27'){
                document.getElementById('canrespre').readOnly = true;
                document.getElementById('canrespre').value = 7;
           
            }else if(val=='28'){
                document.getElementById('canrespre').readOnly = true;
                document.getElementById('canrespre').value = 1;
            }else {
                document.getElementById('canrespre').readOnly = false;
                document.getElementById('canrespre').value = 1;
            }
        }
    </script>

    <form name="form2" action="home.php" method="get" >
        <table width="400">
            <tr>
                <td colspan="4" align="center">
                    <h1> Editar Pregunta</h1>
                </td>
            </tr>
            <tr>
                <td align="left">Descripcion
                    <input type="hidden" name="pac" id="pac" value="115" />
                    <input type="hidden" name="up" id="up" value="11" />
                    <input type="hidden" name="cod_encuesta" id="cod_encuesta" value="<?php echo $encuesta[0]['noenc'] ?>" />
                    <input type="hidden" name="pr" id="pr" value="<?php echo $cod_pregunta ?>" />
                </td>
                <td colspan="3"><textarea name="despre" cols="50" rows="3" required><?php echo $pregunta[0]["despre"]; ?></textarea></td>
            </tr>
            <tr>

            <tr>
                <td align="left">Tipo de Pregunta</td>
                <td>
                    <select name="tppre" onchange="fnTipoPreguntas(this.value)">
                        <option value="0" selected="selected">..Seleccione..</option>
                        <?php
                        //Seleccion de pregunta
                        
                        for ($i = 0; $i < count($tipos_pregunta); $i++) {
                            ?>

                            <option value="<?php echo $tipos_pregunta[$i]['codval'] ?>" <?php if($tipos_pregunta[$i]['codval']==$pregunta[0]["tppre"]){ echo "selected='selected'";} ?>><?php echo $tipos_pregunta[$i]['nomval'] ?></option>

                        <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td align="left">Cantidad de Respuestas</td>
                <td>  <input type="text" name="canrespre" size="15" maxlength="50" required value="<?php echo $pregunta[0]["canrespre"]; ?>" /></td>
                <td colspan="2" align="center">
                    <input type="submit" value="Editar" name="editar" id="editar" />
                    <input type="button" value="Volver" class="button" id="Volver" onclick="window.location.href='home.php?pac=115&pr=<?php echo $cod_encuesta;?>'" />
                </td>
<!--                <td align="left">Pregunta Obligatoria</td>
                <td> <input type="checkbox" name="obli" value="si"></td>-->


            </tr>
        </table>
    </form>
</center>
