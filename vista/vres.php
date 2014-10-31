<?php
include ("controlador/cres.php");
?>

<center>
    <form name="form1" action="" method="post" >

        <table width="400" >
            <tr>
                <td align="left" Style="font-size:12px; font-family:verdana, trebuchet Ms;">No. de Encuesta:</td>
                <td width="170" Style="font-size:12px;"><?php echo $noenc ?></td>

            </tr>
            <tr>
                <td align="left" Style="font-size:12px; font-family:verdana, trebuchet Ms;">No. de pregunta:</td>
                <td width="170" Style="font-size:12px;"><?php echo $dat1[0]['id'] ?></td>

            </tr>
            <tr>
                <td align="left" Style="font-size:12px; font-family:verdana, trebuchet Ms;">Nombre:</td>
                <td  Style="font-size:12px;"><?php echo $dat1[0]['despre'] ?></td>
            </tr>
            <tr>
                <td align="left" Style="font-size:12px; font-family:verdana, trebuchet Ms;">Tipo de pregunta:</td>
                <td  Style="font-size:12px;"><?php echo $dat1[0]['tppre'] ?></td>
            </tr>
            <tr>
                <td align="left" Style="font-size:12px; font-family:verdana, trebuchet Ms;">Cantidad de Respuestas:</td>
                <td  Style="font-size:12px;"><?php echo $dat1[0]['canrespre'] ?></td>
            </tr>
        </table>

    </form>

    <?php
    $ins->pintarTP($dat1[0]['tppre'], $canrespre, $dat1[0]['id'],$noenc);
    ?>
</center>