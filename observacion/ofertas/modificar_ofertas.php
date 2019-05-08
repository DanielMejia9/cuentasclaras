<?php 
include("start.php");
include("../controle/vSession.php");
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$oferta = new TrabajosActuales();

//echo $_GET["codi_trab"];
$mod = $oferta->listarOfertasMod($_GET["codi_trab"]);



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
        <?php
		if($rol == 1)
		{
			?>
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
                <?php
				}
				?>
                <h2 style="padding-top:12px;">Editar Oferta</h2>
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor">
                <div id="sub-contenedor">
<form name="form_mod_ofer" id="form_mod_ofer" action="modificar_ofertas.php?codi_trab=<?php echo $mod[0]['id_trab'] ?>" method="post">
<input type="hidden" name="cod_uniofer" id="cod_uniofer"  value="<?php echo $mod[0]['id_trab'] ?>"/> 
				<div id="fila">
                    <div id="columna" style="float:left; width:33%">
                    	<span class="desc">ID: <?php echo $mod[0]['id_trab'] ?></span>
                        
                    </div>
                	<div id="columna" style="float:left; width:33%">
                        <span class="desc">Prioridad: </span>
                        <select id="prio" name="prio" >
                       <?php 
						    $prio = $oferta->comboPrioridad();
							if ($mod[0]['fkid_prio'] == 0)
							{
								echo "<option value='0'>Seleccione...</option>";
								for($a=0;$a<sizeof($prio);$a++)
								{
									echo "<option value=".$prio[$a]['id_prio'].">".$prio[$a]['desc_prio']."</option>";
								}
							}
							if ($mod[0]['fkid_prio'] !=0)
							{
								$prioridad =$mod[0]['fkid_prio'];
								$prio2 = $oferta->prioridadCombo($prioridad);
								for($c=0;$c<sizeof($prio2);$c++)
								{
									echo "<option value=".$prio2[$c]['id_prio'].">".$prio2[$c]['desc_prio']."</option>";
									$prio3 = $oferta->listarComboPrioridad($prioridad);
									for($o=1;$o<sizeof($prio3);$o++)
									{
										echo "<option value=".$prio3[$o]['id_prio'].">".$prio3[$o]['desc_prio']."</option>";
									}	
								}
							}
						?>
                        </select>
                        
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Requerimiento:</span>
                       <select id="requ" name="requ" >
                        <?php 
						    $creq = $oferta->comboRequemiento();
							if ($mod[0]['fkid_requ'] == 0)
							{
								echo "<option value='0'>Seleccione...</option>";
								for($p=0;$p<sizeof($creq);$p++)
								{
									echo "<option value=".$creq[$p]['id_requ'].">".$creq[$p]['desc_requ']."</option>";
								}
							}
							if ($mod[0]['fkid_requ'] !=0)
							{
								$requerimiento =$mod[0]['fkid_requ'];
								$creq2 = $oferta->comboRequemiento2($requerimiento);
								for($b=0;$b<sizeof($creq2);$b++)
								{
									echo "<option value=".$creq2[$b]['id_requ'].">".$creq2[$b]['desc_requ']."</option>";
									$creq3 = $oferta->listarRequemiento($requerimiento);
									for($q=1;$q<sizeof($creq3);$q++)
									{
										echo "<option value=".$creq3[$q]['id_requ'].">".$creq3[$q]['desc_requ']."</option>";
									}	
								}
							}
						?>
                        </select>
                   </div>
                   
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:50%">
                   		<span class="desc">Proyecto:</span>  
                        <textarea id="proye" name="proye" cols="35" rows="8"><?php echo $mod[0]['proy_trab'] ?></textarea>
                   </div>
                   <div id="columna" style="float:left; width:50%">
                   		<span class="desc">Trabajo:</span>  
                        <textarea id="trab" name="trab" cols="35" rows="8"><?php echo $mod[0]['trab_trab'] ?></textarea>
                   </div>
                </div>
                <div id="fila">  
                   
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Forma de Pago: </span>
                        <select id="form" name="form" >
                         <?php 
							$row = $oferta->libCombo($_GET["codi_trab"],'tb_trabajos_actuales','id_trab');
							
							for($i=0;$i<sizeof($row);$i++)
							{
								
								if ($row[$i]['form_trab']==1)
								{
									$desc = "ONE TIME";
									$value = 1;
									echo "<option class='optSel' value=".$value.">".$desc."</option>";
									echo "<option class='optSel' value='2'>Semanal</option>";
									}
									else if ($row[$i]['form_trab']==2)
									{
										$desc = "Semanal";
										$value = 2;
										echo "<option class='optSel' value=".$value.">".$desc."</option>";
										echo "<option class='optSel' value='1'>ONE TIME</option>";
										}
										else
										{
											echo "<option class='optSel' value='0'>Seleccione...</option>";
											echo "<option class='optSel' value='1'>ONE TIME</option>";
											echo "<option class='optSel' value='2'>Semanal</option>";
											}
							}				
						?>
                       </select>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Modalidad de Trabajo: </span>
                         <select id="moda" name="moda" >
                         <?php 
							$row = $oferta->libCombo2($_GET["codi_trab"],'tb_trabajos_actuales','id_trab');
							
							for($i=0;$i<sizeof($row);$i++)
							{
								
								if ($row[$i]['moda_trab']==1)
								{
									$desc = "ONE TIME";
									$value = 1;
									echo "<option class='optSel' value=".$value.">".$desc."</option>";
									echo "<option class='optSel' value='2'>Semanal</option>";
									}
									else if ($row[$i]['moda_trab']==2)
									{
										$desc = "Semanal";
										$value = 2;
										echo "<option class='optSel' value=".$value.">".$desc."</option>";
										echo "<option class='optSel' value='1'>ONE TIME</option>";
										}
										else
										{
											echo "<option class='optSel' value='0'>Seleccione...</option>";
											echo "<option class='optSel' value='1'>ONE TIME</option>";
											echo "<option class='optSel' value='2'>Semanal</option>";
											}
							}				
						?>
                       </select>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Observaciones:</span>  
                        <textarea id="obse" name="obse" cols="35" rows="8"><?php echo $mod[0]['obse_trab'] ?></textarea>
                   </div>
                </div>
                 <div id="fila">
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Cantidad de Trabajo: </span>
                       <input type="text" id="cant" name="cant" value="<?php echo $mod[0]['cant_trab'] ?>"   onkeyup="sumarCantidad();" />
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Monto Bsf: </span>
                       <input type="text" id="mont_vef" name="mont_vef" value="<?php echo $mod[0]['mont_bsf_trab'] ?>" onkeyup="sumarCantidad();" />
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Total Trabajo Bsf: </span>
                       <input type="text" id="tota_vef" name="tota_vef"  value="<?php echo $mod[0]['tota_vef_trab'] ?>" onkeyup="sumarCantidad();" />
                   </div>
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Tiempo Estimado: </span>
                       <input type="text" id="tiem" name="tiem" value="<?php echo $mod[0]['tiem_esti_trab'] ?>" />
                   </div>
                    <div id="columna" style="float:left; width:33%">
                   		<span class="desc">¿Quienes puedes ver la Oferta?:</span>
                        <?php
					   $visu = $oferta->listarUsuarios();
					   for($n=1;$n<sizeof($visu);$n++)
					   {
						?>
                        <div id="radio"><input type='checkbox' value="<?php echo $visu[$n]['id_usuario']?>"  style="float:left; width:20px; clear:left"/><span style="margin-left:5px; padding-top:2px"><?php echo $visu[$n]['nomb_usuario']." ".$visu[$n]['apel_usuario']; ?></span></div>
						<?php
						}
					   ?>
                   </div>
                   
                   <?php 
				   if($rol==1)
				   {
				   ?>
                    <div id="columna" style="float:left; width:33%">
                    	<span class="desc">Asignar trabajos a usuario: </span>
                   		<select id="asigna_usuario" name="asigna_usuario" >
                         <?php 
						    $cml = $oferta->comboUsuario();
							if ($mod[0]['id_usuario'] == 0)
							{
								echo "<option value='0' style='text-align:center;'>Seleccione</option>";
								for($y=1;$y<sizeof($cml);$y++)
								{
									echo "<option value=".$cml[$y]['id_usuario'].">".$cml[$y]['nomb_usuario']." ".$cml[$y]['apel_usuario']."</option>";
                                    }
								}
							if ($mod[0]['id_usuario'] !=0)
							{
								$usuario =$mod[0]['id_usuario'];
								$cmls = $oferta->usuarioCombo($usuario);
									 
								for($g=0;$g<sizeof($cmls);$g++)
								{
									echo "<option value=".$cmls[$g]['id_usuario'].">".$cmls[$g]['nomb_usuario']." ".$cmls[$g]['apel_usuario']."</option>";
									$cmlx = $oferta->listarCombo($usuario);
									for($f=1;$f<sizeof($cmlx);$f++)
									{
										echo "<option value=".$cmlx[$f]['id_usuario'].">".$cmlx[$f]['nomb_usuario']." ".$cmlx[$f]['apel_usuario']."</option>";
									}
								}
							}
						?>
                       </select>
                   </div>
                   <?php
				   }
				   ?>
                </div>
                <input  type="hidden" name="anadir" id="anadir"  value="si" />
                <?php
				$rol = $_SESSION["rol"];
				if($rol == 1)
				{
				?>
                	<input type="button" id="btn" name="username" value="Actualizar" onclick="validaModOferta();" />
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