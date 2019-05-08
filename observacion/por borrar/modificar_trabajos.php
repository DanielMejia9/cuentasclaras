<?php 
include("start.php");
include("controle/vSession.php");
require_once("class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$trabajo = new TrabajosActuales();


$mod = $trabajo->listarTrabajo($_GET["codi_trab"]);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<script  type="application/javascript" src="jscript/funciones.js"></script>
<script type="text/javascript" src="jscript/jquery-1.4.2.min.js"></script>
<script language="javascript" src="jscript/jquery-1.3.min.js"></script>
<script src="jscript/jquery.ui.core.js"></script>
<script src="jscript/jquery.ui.widget.js"></script>
<script src="jscript/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" href="css/jquery.ui.all.css">
<link href="css/style_menu.css" rel="stylesheet" type="text/css" />
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
<title>Registro del Cliente</title>
</head>
<body class="dt-example" <?php // echo $style;?>>
<div id="pantalla">
    <div id="conten">
        <div id="top">
        	<div id="logo">
            	<img src="images/logo.png"  />
                <div id="tituloSistem">Cuentas Claras</div>
            </div>
            <div id="liDet">
            	<span style="padding-left:5px"><?php //echo ("Bienvenido! "). ucwords ($nomUser);?></span>
            </div>
		<?php
	/*if (isset($_SESSION['k_username'])) {
		$nomUser = ($_SESSION['k_username']);
		$valSes = 1;
		}
		else{
		$valSes = 2;
		}*/
	   ?>
	   <?php // include("include/menu.php");?></div>
        <div id="fila_columna">
            <div id="columna1">columna1</div>
            <div id="columna2">
    <center>
    <div id="cuerpo_general">
    	<div id="tilulos">
            	<div id="botenes">
                 <div style="width:60px; float:left; margin:0px 20px 0px 0px; "><!--Boton consultar--->
                    	<center>
                            <a href="trabajos_actuales.php">
                                <img src="images/ico-consu.png" border="0" width="30" />
                                <div>Consulta</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton consultar-->
                	<div style="width:60px; float:left; margin:0px 20px 0px 0px"><!--Boton Añadir--->
                    	<center>
                            <a href="add_trabajos.php">
                                <img src="images/ico-add.png" border="0" width="30" />
                                <div>Añadir</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton añadir-->
                </div>	
                <h2 style="padding-top:12px;">Editar Trabajos</h2>
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor">
                <div id="sub-contenedor">
<form name="form_mod_trab" id="form_mod_trab" action="modificar_trabajos.php?codi_trab=<?php echo $mod[0]['id_trab'] ?>" method="post">
<input type="hidden" name="cod_unitrab" id="cod_unitrab"  value="<?php echo $mod[0]['id_trab'] ?>"/> 
				<div id="fila">
                	<div id="columna" style="float:left; width:33%">
                        <span class="desc">Prioridad: </span>
                        <select id="prio" name="prio" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                       </select> 
                   </div>
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Requerimiento 1:</span>  
                        <textarea id="req1" name="req1" cols="35" rows="8"><?php echo $mod[0]['requ_1_trab'] ?></textarea>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Requerimiento 2:</span>  
                        <textarea id="req2" name="req2" cols="35" rows="8"><?php echo $mod[0]['requ_2_trab'] ?></textarea>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Proyecto:</span>  
                        <textarea id="proye" name="proye" cols="35" rows="8"><?php echo $mod[0]['proy_trab'] ?></textarea>
                   </div>
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Trabajo:</span>  
                        <textarea id="trab" name="trab" cols="35" rows="8"><?php echo $mod[0]['trab_trab'] ?></textarea>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Forma de Pago: </span>
                        <select id="form" name="form" >
                        	<option value="0">Seleccione</option>
                            <option value="1">ONE TIME</option>
                            <option value="2">Semanal</option>
                       </select>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Modalidad de Trabajo: </span>
                        <select id="moda" name="moda" >
                        	<option value="0">Seleccione</option>
                            <option value="1">Diario</option>
                            <option value="2">Semanal</option>
                       </select>
                   </div>
                </div>
                 <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Observaciones:</span>  
                        <textarea id="obse" name="obse" cols="35" rows="8"><?php echo $mod[0]['obse_trab'] ?></textarea>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Link: </span>
                        <textarea id="link" name="link" cols="35" rows="8"><?php echo $mod[0]['link_trab'] ?></textarea>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Cantidad de Trabajo: </span>
                       <input type="text" id="cant" name="cant" value="<?php echo $mod[0]['cant_trab'] ?>"  />
                   </div>
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Monto VEF: </span>
                       <input type="text" id="mont_vef" name="mont_vef" value="<?php echo $mod[0]['mont_bsf_trab'] ?>" />
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Monto US: </span>
                       <input type="text" id="mont_us" name="mont_us" value="<?php echo $mod[0]['mont_us_trab'] ?>"  />
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Total Trabajo: </span>
                       <input type="text" id="tota" name="tota"  value="<?php echo $mod[0]['tota_trab'] ?>" />
                   </div>
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Tiempo Estimado: </span>
                       <input type="text" id="tiem" name="tiem" value="<?php echo $mod[0]['tiem_esti_trab'] ?>" />
                   </div>
                </div>
                <input  type="hidden" name="anadir" id="anadir"  value="si" />
                <input type="button" id="btn" name="username" value="Actualizar" onclick="validaRegMod();" />
                <input type="reset" id="btn" value="Limpiar" />
				</form>
                    </div><!--Sub-Contenedor-->
        	</div><!--Contenedor-->
            
       </div><!--Cuerpo general--->
       <div id="pie">
            	Desarrollado por Tecnologia y Desarrollo Jirehpro, C.A. J-40135922-1
                Para soporte Técnico contactenos al 0212.888.81.12 - Sitio Web: wwww.jirehpro.com
            </div><!--Pie-->
    </center>
    

</body>
</html>