<?php include("start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $pago =  new Pagos();
	  include("../controle/vSession.php");
	  $id_usuario = $_SESSION["id_usuario"];	
	  //print_r($_POST);
	  
	  $mpagos = $pago->misPagos($id_usuario);
	  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script  type="application/javascript" src="../jscript/funciones.js"></script>

<link rel="stylesheet" href="../css/jquery.ui.all.css">
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />
<title>Pagar</title>
<script language="javascript" src="../jscript/jquery-1.3.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#usuarios").change(function () {
           $("#usuarios option:selected").each(function () {
            id_category = $(this).val();
            $.post("subcategories.php", { id_category: id_category }, function(data){
                $("#trabajo").html(data);
            });            
        });
   })
});






</script>
</head>
<body class="dt-example" <?php // echo $style;?>>

<div id="pantalla">
    <div id="conten">
        <div id="top">
        	<div id="logo">
            	<img src="../images/logo.png"  />
                <div id="tituloSistem">Cuentas Claras</div>
                
             </div>
     	</div>     
		<?php
	if (isset($_SESSION['k_username'])) {
		$nomUser = ($_SESSION['k_username']);
		$valSes = 1;
		}
		else{
		$valSes = 2;
		}
	   ?>
       <div id="liDet"><span style="padding-left:5px;color: #2C4463;"><?php echo ("Bienvenido! "). ucwords ($nomUser);?></span></div>
       <div id="fila_columna">
            <div id="columna1"><?php include("../include/menu.php")?></div>
            <div id="columna2">
    

            <center>
                <div id="cuerpo_general" >
                    <div id="tilulos">
                    
                            <div id="botenes">
                            	<div style="width:60px; float:left; margin:0px 20px 0px 0px; "><!--Boton consultar--->
                                    <center>
                                        <!--<a href="trabajos_actuales.php">
                                            <img src="../images/ico-consu.png" border="0" width="30" />
                                            <div>Consulta</div>	
                                        </a>-->
                                    </center>
                                </div>
                                <div style="width:60px; float:left; margin:0px 20px 0px 0px">
                                    <center>
                                        <!--<a href="add_trabajos.php">
                                            <img src="../images/ico-add.png" border="0" width="30" onclick="addTrabajo();" />
                                            <div>Añadir</div>	
                                        </a>-->
                                    </center>
                                </div>
                            </div><!--Cierre boton consultar-->	
                          
                            <h2 style="padding-top:12px;">Mis Pagos</h2>   
                    </div><!----Cierre Div Titulo--->
                        <div id="contenedor-cliente" >
							<?php for($i=0;$i<sizeof($mpagos);$i++)
						  	{
							?>
                            <div id="estilo">
                            <div id="fila"> 
                              <div id="columna" style="float:left; width:30%">
									<span class="desc">N° Pago:</span>
                                   <input type="text" value="<?php echo $mpagos[$i]["id_pago"]?>" disabled="disabled" />
                              </div>
                              <div id="columna" style="float:left; width:30%">
									<span class="desc">Fecha desde:</span>
                                  <input type="text" value="<?php echo $mpagos[$i]["fecha_desde"];?>" disabled="disabled" />
                              </div>
                              <div id="columna" style="float:left; width:30%">
									<span class="desc">Fecha hasta:</span>
                                  <input type="text" value="<?php echo $mpagos[$i]["fecha_hasta"];?>" disabled="disabled" />
                              </div>
                              <div id="columna" style="float:left; width:30%">
									<span class="desc">Monto Cancelado:</span>
                                  <input type="text" value="<?php echo number_format($mpagos[$i]["monto_depo"], 2, ',', '.')." Bsf";?>" disabled="disabled" />
                              </div>
                              <div id="columna" style="float:left; width:30%">
									<span class="desc">Número de Deposito:</span>
                                    <input type="text" value="<?php echo $mpagos[$i]["nume_depo"];?>" disabled="disabled" />
                              </div>
							  
                            </div>
                            <div id="fila"> 
                              <div id="columna" style="float:left; width:66%">
									<span class="desc">Proyecto:</span>
                                    <textarea cols="35" rows="8" disabled="disabled"><?php echo $mpagos[$i]["proy_trab"];?></textarea>
                              </div>
                              <div id="columna" style="float:left; width:33%">
									<span class="desc">Comprobante:</span>
                                    <?php if($mpagos[$i]["img_depo"] !="")
									{
									echo "<a href='comprobantes/".$mpagos[$i]["img_depo"]."'><img src='comprobantes/".$mpagos[$i]["img_depo"]."' width='50%'/></a>";
									}
									else
									{
									echo "<img src='../images/no-image.png' width='100'/>";
									}								
									?>
							  </div>  
                            </div>
                            </div>
                          <?php
                          }
						  ?>
                       </div>
                </div><!--Cuerpo general--->
            </center>
            </div>
		</div>
        
	</div> 
</div>
</body>
</html>