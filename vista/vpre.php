
<?php
include ("controlador/cpre.php");
?>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<title>Pregunta</title>
<body>
<center>
    <!--<form name="form1" action="" method="post" >-->
    <table width="381">
        <tr>
            <td width="145" align="left"><span class="style1">Nombre Encuesta:</span></td>
            <td width="224"><b><?php echo $daenc[0]['nombre'] ?></b></td>

        </tr>
        <!--<tr>
            <td width="145" align="left"><span class="style1">Cod. Encuesta:</span></td>
            <td width="224"><?php echo $daenc[0]['noenc'] ?></td>

        </tr>-->
        <tr>
            <td align="left">Fecha Inicio:</td>
            <td width="224"><?php echo $daenc[0]['fecinienc'] ?>
            </td>
        </tr>
        <tr>
            <td>Fecha Fin:</td>
            <td><?php echo $daenc[0]['fecfinenc'] ?></td>
        </tr>
    </table>
    <img src="image/preguntas.png" alt="" width="141" height="45" align="top">
    <!--</form>       -->

    <script>
        function fnTipoPreguntas(val) {
            if (val == '24') {
                document.getElementById('canrespre').readOnly = true;
                document.getElementById('canrespre').value = 2;
            } else if (val == '27') {
                document.getElementById('canrespre').readOnly = true;
                document.getElementById('canrespre').value = 7;

            } else if (val == '28') {
                document.getElementById('canrespre').readOnly = true;
                document.getElementById('canrespre').value = 1;
            } else {
                document.getElementById('canrespre').readOnly = false;
                document.getElementById('canrespre').value = 1;
            }
        }
    </script>



    <form name="form2" action="home.php?pac=116&up=11" method="post" >
        <table width="400">
            <tr>
                <td colspan="4" align="center">
                    <h1>Adicionar Pregunta</h1>
                </td>
            </tr>
            <tr>
                <td align="left">Descripcion
                    <input type="hidden" name="noenc" value="<?php echo $daenc[0]['noenc'] ?>" />
                </td>
                <td colspan="3"><textarea name="despre" cols="50" rows="3" required></textarea></td>
            </tr>
            <tr>

            <tr>
                <td align="left">Tipo de Pregunta</td>
                <td>
                    <select name="tppre" onChange="fnTipoPreguntas(this.value)">
                        <option value="0" selected="selected">..Seleccione..</option>
                        <?php
                        //Seleccion de pregunta
                        $dat1 = $ins->seltpre();
                        for ($i = 0; $i < count($dat1); $i++) {
                            ?>

                            <option value="<?php echo $dat1[$i]['codval'] ?>"><?php echo $dat1[$i]['nomval'] ?></option>

                        <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td align="left">Cantidad de Respuestas</td>
                <td>  <input type="text" name="canrespre" id="canrespre" size="15" maxlength="50" required value="1" /></td>
                <td colspan="2" align="center">
                    <input id="boton1" type="submit" value="Crear" />
                    <input  id="boton1" type="button" value="Volver" onClick="window.location.href = 'home.php?pac=108';" />
                </td>
<!--                <td align="left">Pregunta Obligatoria</td>
                <td> <input type="checkbox" name="obli" value="si"></td>-->


            </tr>
        </table>
    </form>

</center>

<script>
    (function($) {
        $(document).ready(function() {
            $('#menuencuesta > ul > li > a').click(function() {
                $('#menuencuesta li').removeClass('active');
                $(this).closest('li').addClass('active');
                var checkElement = $(this).next();
                if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                    $(this).closest('li').removeClass('active');
                    checkElement.slideUp('normal');
                }
                if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                    $('#menuencuesta ul ul:visible').slideUp('normal');
                    checkElement.slideDown('normal');
                }
                if ($(this).closest('li').find('ul').children().length == 0) {
                    return true;
                } else {
                    return false;
                }
            });
        });
    })(jQuery);
</script>

<form id="form3" name="form3" method="post" action="" onSubmit="return confirm('Desea eliminar?')">
    <center><h2>Preguntas Creadas</h2></center>
    <div id='menuencuesta'>
        <ul>      
            <?php
            //Select
            $dat = $ins->selpre($daenc[0]['noenc']);
            $dat2 = $ins->selpre3();
            ?>

            <?php
            for ($j = 0; $j < count($dat); $j++) {
                ?>	
                <li class='has-sub'><a href='#'><span>
                            <table width="400" align="center">
                                <tr> 
                                    <td class="style2" align="left"><h2><?php echo ($j + 1) . "." ?></h2></td>
                                    <td class="style2"><h2><?php echo $dat[$j]['despre'] ?></h2></td> 

                                </tr>
                            </table>
                        </span></a>
                            <ul>
                                <li><a href='#'><span>
                                            <table width="400" align="center">
                                                <tr>          
                                                    <td ><a href="home.php?pr=<?php echo $dat[$j]['codpre'] ?>&pac=115&up=11&cod_encuesta=<?php echo $dat[$j]['noenc']; ?>"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
                                                    <td ><a href="home.php?pac=115&tppre=<?php echo $dat[$j]['tppre']; ?>&codpre=<?php echo $dat[$j]['codpre']; ?>&del=yes&pr=<?php echo $dat[$j]['noenc']; ?>"><img border=0 src="image/eliminar.png" width="16" height="16" /></a></td>
                                                </tr>
                                                <?php
                                                $a = 1;
                                                for ($i = 0; $i < count($dat2); $i++) {
                                                    if (($dat[$j]['codpre']) == $dat2[$i]['codpre']) {
                                                        ?>
                                                        <tr>

                                                            <?php if ($dat[$j]['tppre'] == 24) { ?>
                                                                <td  colspan="4" class="style2" align="left"><?php echo $dat2[$i]['res'] ?></td>         

                                                                <?php
                                                            } else if ($dat[$j]['tppre'] == 25) {
                                                                ?>
                                                                <td  colspan="4" class="style2" align="left"><input type="radio" name="radio_' .$dat2[$i]["res"].'"/><?php echo $dat2[$i]['res'] ?></td>
                                                                <?php
                                                            } else if ($dat[$j]['tppre'] == 26) {
                                                                ?>
                                                                <td  colspan="4" class="style2" align="left"><input type="checkbox" name="check_' . $dat2[$i]["res"] .'"> <?php echo $dat2[$i]['res'] ?></td>
                                                                <?php
                                                            } else if ($dat[$j]['tppre'] == 27) {
                                                                ?>
                                                                <td  colspan="4" class="style2" align="left"><input type="text" placeholder="<?php echo $dat2[$i]['res'] ?>" name="' . $dat2[$i]["res"] .'"></td>
                                                                <?php
                                                            } else if ($dat[$j]['tppre'] == 28) {
                                                                ?>
                                                                <td  colspan="4" class="style2" align="left"><input type="text" size="40" placeholder="<?php echo $dat2[$i]['res'] ?>" name="abierta_' . $dat2[$i]["codpre"] .'"></td>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>

                                                </tr>
                                            </table>
                                        </span></a></li>
                                        
                                </ul>
                        </li>
            <?php } ?>



        </ul>

    </div>
</form>