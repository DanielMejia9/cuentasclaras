<?php include("start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $oferta =  new TrabajosActuales();
	  
	  if(isset($_POST["anadir"]) and $_POST["anadir"]=="si")
		{
		//print_r($_POST);
		//print_r($_POST["codi_clie"]);
		$anadir = $oferta->anadirTrabajo($_POST["prio"],$_POST["requ"],$_POST["proye"],
		$_POST["trab"],$_POST["form"],$_POST["moda"],$_POST["obse"],$_POST["cant"],$_POST["mont_vef"],
		$_POST["tota_vef"],$_POST["tiem"]);
			exit;
		}
	  include("../controle/vSession.php");
	  
	  
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
<title>Añadir Oferta</title>
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
            	<div id="botenes">
                 <div style="width:60px; float:left; margin:0px 20px 0px 0px; "><!--Boton consultar--->
                    	<center>
                            <a href="trabajos_actuales.php">
                                <img src="../images/ico-consu.png" border="0" width="30" />
                                <div>Consulta</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton consultar-->
                	<div style="width:60px; float:left; margin:0px 20px 0px 0px"><!--Boton Añadir--->
                    	<center>
                            <a href="add_trabajos.php">
                                <img src="../images/ico-add.png" border="0" width="30" />
                                <div>Añadir</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton añadir-->
                </div>	
                <h2 style="padding-top:12px;">Añadir Oferta</h2>
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor">
                <div id="sub-contenedor">
               <!-- <div style="background:rgb(245, 245, 245); text-align:left; padding: 10px 0px 0px 10px; height:30px; border-bottom: 1px  #C0C0C0 solid;">
                	<span style="color: #003E55; font-weight:bold;">Datos de la Empresa </span>
                </div>-->
                <form name="form_trab" id="form_trab" action="add_ofertas.php" method="post">
				<div id="fila">
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
                        <textarea id="proye" name="proye" cols="35" rows="8"  maxlength="999"></textarea>
                   </div>
                   <div id="columna" style="float:left; width:50%">
                   		<span class="desc">Trabajo:</span>  
                        <textarea id="trab" name="trab" cols="35" rows="8"  maxlength="999"></textarea>
                   </div>
                </div>
                <div id="fila">  
                   
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
                            <option value="1">ONE TIME</option>
                            <option value="2">Semanal</option>
                       </select>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Observaciones:</span>  
                        <textarea id="obse" name="obse" cols="35" rows="8"  maxlength="999"></textarea>
                   </div>
                </div>
                 <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Cantidad de Trabajo: </span>
                       <input type="text" id="cant" name="cant" onkeyup="sumarCantidad();"   />
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Monto BSF: </span>
                       <input type="text" id="mont_vef" name="mont_vef" onkeyup="sumarCantidad();" />
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Total Trabajo: </span>
                       <input type="text" id="tota_vef" name="tota_vef"   onkeyup="sumarCantidad();" />
                   </div>
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:50%">
                   		<span class="desc">Tiempo Estimado: </span>
                       <input type="text" id="tiem" name="tiem"  />
                   </div>
                   <!--<div id="columna" style="float:left; width:50%">
                   		<span class="desc">Usuario: </span>
                       <select id="asigna_usuario" name="asigna_usuario" width="100%">
                       		<option value="0">Seleccionar...</option>
                       		<?php 
								$combo = $oferta->comboUsuario();
								
								for($i=0;$i<sizeof($combo);$i++)
								{echo "<option value='".$combo[$i]['id_usuario']."'>".$combo[$i]['nomb_usuario']." ".$combo[$i]['apel_usuario']."</option>";}
							?>
                       </select>
                   </div>-->
                </div>
                <input  type="hidden" name="anadir" id="anadir"  value="si" />
                <input type="submit" id="btn" name="username" value="Añadir"  />
                <input type="reset" id="btn" value="Limpiar" />
				</form>
                    </div><!--Sub-Contenedor-->
        	</div><!--Contenedor-->
            
       </div><!--Cuerpo general--->
       <!--<div id="pie">
            	Desarrollado por Tecnologia y Desarrollo Jirehpro, C.A. J-40135922-1
                Para soporte Técnico contactenos al 0212.888.81.12 - Sitio Web: wwww.jirehpro.com
            </div><!--Pie-->
    </center>
    

</body>
</html>