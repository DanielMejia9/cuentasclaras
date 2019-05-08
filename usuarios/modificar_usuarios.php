<?php 
include("start.php");
include("../controle/vSession.php");
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$usuarios = new TrabajosActuales();

//echo $_GET["codi_trab"];
$mod = $usuarios->listarUsuariosMod($_GET["codi_trab"]);



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
<title>Modificar la Oferta</title>
</head>
<body onload="Deshabilitar();" class="dt-example" <?php // echo $style;?>>
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
            	<div id="botenes">
                 <div style="width:60px; float:left; margin:0px 20px 0px 0px; "><!--Boton consultar--->
                    	<center>
                            <a href="ofertas_actuales.php">
                                <img src="../images/ico-consu.png" border="0" width="30" />
                                <div>Consulta</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton consultar-->
                	<div style="width:60px; float:left; margin:0px 20px 0px 0px"><!--Boton Añadir--->
                    	<center>
                            <a href="add_ofertas.php">
                                <img src="../images/ico-add.png" border="0" width="30" />
                                <div>Añadir</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton añadir-->
                </div>	
                <h2 style="padding-top:12px;">Editar Usuarios</h2>
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor">
                <div id="sub-contenedor">
<form name="form_mod_usua" id="form_mod_usua" action="modificar_usuarios.php?codi_trab=<?php echo $mod[0]['id_usuario'] ?>" method="post">
<input type="hidden" name="cod_uniusua" id="cod_uniusua"  value="<?php echo $mod[0]['id_usuario'] ?>"/> 
				
                
                <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Nombre:</span>  
                        <input type="text" id="nomb" name="nomb" size="20" value="<?php echo $mod[0]['nomb_usuario'] ?>"/>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Apellido:</span>  
                       <input type="text" id="apel" name="apel" size="20" value="<?php echo $mod[0]['apel_usuario'] ?>"/>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Cedula:</span>  
                        <input type="text" id="cedu" name="cedu" size="20" value="<?php echo $mod[0]['cedu_usuario'] ?>"/>
                   </div>
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Correo:</span>  
                        <input type="text" id="corr" name="corr" size="20" value="<?php echo $mod[0]['corr_usuario'] ?>"/>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Telefono:</span>  
                        <input type="text" id="tele" name="tele" size="20" value="<?php echo $mod[0]['tele_usuario'] ?>"/>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Telefono Opcinal:</span>  
                        <input type="text" id="teleopci" name="teleopci" size="20" value="<?php echo $mod[0]['tele_opci_usuario'] ?>"/>
                   </div>
                </div>
                 <div id="fila">  
                   <div id="columna" style="float:left; width:50%">
                   		<span class="desc">Password:</span>  
                        <input type="password" id="pass" name="pass" size="20"/>
                   </div>
                   <div id="columna" style="float:left; width:50%">
                   		<span class="desc">Rol:</span>  
                        <select id="asignar_rol" name="asignar_rol" />
                        <?php
						
							if ($mod[0]['id_rol'] !=0)
								{
									$rol =$mod[0]['id_rol'];
									$cmls = $usuarios->usuarioComboUsuarios($rol);
									 
									 	for($g=0;$g<sizeof($cmls);$g++)
									 	{
											echo "<option value=".$cmls[$g]['id_rol'].">".$cmls[$g]['desc_rol']."</option>";
											
											
	
											$cmlx = $usuarios->listarComboUsuarios($rol);
											for($f=1;$f<sizeof($cmlx);$f++)
											{
												echo "<option value=".$cmlx[$f]['id_rol'].">".$cmlx[$f]['desc_rol']."</option>";
												}
											
											}
									}
						
                        
                        
                        ?>
                        </select>
                   </div>
                </div>
                <input  type="hidden" name="anadir" id="anadir"  value="si" />
                <?php
				$rol = $_SESSION["rol"];
				if($rol == 1)
				{
				?>
                	<input type="button" id="btn" name="username" value="Actualizar" onclick="validaModUsuario();" />
                <?php
				}
				?>
				<input type='button' id='btn' value='Regresar'  onclick='history.back(-1);'/>
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