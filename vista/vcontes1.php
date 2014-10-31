
<?php 
    include_once("controlador/cformulario.php");
	$perusu = isset($_SESSION["perfil"]) ? $_SESSION["perfil"]:NULL;
?>
<center>
<div style="font-size:12px; font-family:verdana, arial; font-weight:bold;text-align: right;font-style:italic;">
<?php 
    echo "<br><h3>Encuesta: ".($encuesta[0]["nombre"])."</h3></br>";
    echo "<br><h4>Fecha Inicio: ".($encuesta[0]["fecinienc"])."</h4></br>";
    echo "<br><h4>Fecha Fin: ".($encuesta[0]["fecfinenc"])."</h4></br>";
?>
</div> 
</center>
<form id="form3" name="form3" method="POST" action="<?php if($perusu==1){?>home.php?pac=108&pr=<?php echo $idEncuesta;} else{?>home.php?pac=109&up=11&pr=<?php echo $idEncuesta;}?>">
	<table class="tabla" width="600" bordercolor="#666666" border="0.5" >
        <tr>
        <?php 
            $i=1;
            foreach($datos as $item){
                $html="<tbody><td><h5>".$i." ".$item["pregunta"]."</h5>";
                
                  if($item["tipo"]==24){
                      $html.="<select name='ddl_".$item['idPregunta']."'>";
                      foreach ($item["respuestas"] as $res){
                        $html.=$res["value"];
                      }
                      $html.="</select>";
                  }else{
                      foreach ($item["respuestas"] as $res){
                      	$html.=$res["value"];
                      }
                  }  
                                  
                echo $html."</td></tbody>";
            $i++;
            }
        ?>
            
	</tr>
    
    </table>
 
    <center>
    
    <input type="hidden" name="valor" value="1"/>
            <input id="boton1" type="submit" value="Volver" name="volver" id="volver" />  
            <input id="boton1" type="submit" value="Guardar" name="guardar" id="guardar" />  
    	
        </form> 
   