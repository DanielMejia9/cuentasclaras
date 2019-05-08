<?php 
include("start.php");
include("../controle/vSession.php");
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$pagos = new Pagos();
$mod = $pagos->listarPagos($_GET["codi_trab"]);
$usuario =$_SESSION["id_usuario"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script  type="application/javascript" src="../jscript/funciones.js"></script>
<script type="text/javascript" src="../jscript/jquery-1.4.2.min.js"></script>
<script language="javascript" src="../jscript/jquery-1.3.min.js"></script>
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="../css/jquery.ui.all.css">
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />
<script>
     //Codigo del calendario    
     $(function() {
		$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "images/calendar.gif",
		buttonImageOnly: true
		});
		});
	//Codigo script del menu
	function mainmenu(){
		$(" #nav ul ").css({display: "none"});
		$(" #nav li").hover(function(){
		$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
		$(this).find('ul:first').slideUp(400);
		});
		}
		$(document).ready(function(){
			mainmenu();
		});
</script>
<title>Modificar Trabajos</title>
</head>
<body class="dt-example" <?php // echo $style;?>>
<div id="pantalla">
    <div id="conten">
        <div id="top">
        	<div id="logo">
            	<img src="../images/logo.png"  />
                <div id="tituloSistem">Cuentas Claras</div>
                 <div id="liDet"><span style="padding-left:5px;color: #2C4463;"><?php echo ("Bienvenido! "). ucwords ($nomUser);?></span></div>
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
        <div id="fila_columna">
            <div id="columna1"><?php include("../include/menu.php")?></div>
            <div id="columna2">
    <center>
    <div id="cuerpo_general">
    	<div id="tilulos">
         <?php
		if($rol == 1)
		{
			?>
            	<div id="botenes">
                 <div style="width:60px; float:left; margin:0px 20px 0px 0px; "><!--Boton consultar--->
                    	<center>
                            <a href="trabajos_actuales.php">
                                <img src="../images/ico-consu.png" border="0" width="30" />
                                <div>Consulta</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton consultar-->
                	<!--<div style="width:60px; float:left; margin:0px 20px 0px 0px">Boton Añadir
                    	<center>
                            <a href="add_trabajos.php">
                                <img src="../images/ico-add.png" border="0" width="30" />
                                <div>Añadir</div>	
                            </a>
                        </center>
                    </div>Cierre boton añadir-->
                   
                </div> 
				<?php
					}
					?>	
                <h2 style="padding-top:12px;">Editar Pagos</h2>
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor">
                <div id="sub-contenedor">
                <form name="form_mod_pag" id="form_mod_pag" action="modificar_pagos.php?codi_trab=<?php echo $mod[0]['id_trab'] ?>" method="post">
                <input type="hidden" name="cod_unitrab" id="cod_unitrab"  value="<?php echo $mod[0]['id_trab'] ?>"/> 
				<div id="fila">
                	<div id="columna" style="float:left; width:25%">
                    	<span class="desc">Numero de Deposito:</span>
                       <input type="text" id="numerodeposito" name="numerodeposito" value=" <?php echo $mod[0]['nume_depo'] ?>" />
                    </div>
                    <div id="columna" style="float:left; width:25%">
                   		<span class="desc">Fecha desde: </span>
                       <input type="text" id="desde" name="desde" value="<?php echo $mod[0]['fecha_desde'] ?>" />
                   </div>
                   <div id="columna" style="float:left; width:25%">
                   		<span class="desc">Fecha hasta: </span>
                       <input type="text" id="hasta" name="hasta" value="<?php echo $mod[0]['fecha_hasta'] ?>" />
                   </div>
                   <div id="columna" style="float:left; width:25%">
                   		<span class="desc">Monto del Deposito: </span>
                       <input type="text" id="monto" name="monto" value="<?php echo $mod[0]['monto_depo'] ?>" />
                   </div>
                </div>

                <input  type="hidden" name="anadir" id="anadir"  value="si" />
                <input type="button" id="btn" name="username" value="Actualizar" onclick="modificarPago();" />
                <input type='button' id='btn' value='Regresar'  onclick='history.back(-1);'/>
				</form>
                    </div><!--Sub-Contenedor-->
        	</div><!--Contenedor-->
            
       </div><!--Cuerpo general--->
       <!--<div id="pie">
            	Desarrollado por Tecnologia y Desarrollo Jirehpro, C.A. J-40135922-1
                Para soporte Técnico contactenos al 0212.888.81.12 - Sitio Web: wwww.jirehpro.com
            </div>Pie-->
    </center>
    

</body>
</html>