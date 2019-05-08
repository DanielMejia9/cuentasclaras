<?php include("start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $trabajo =  new TrabajosActuales();

	  
		  
			  if(isset($_POST["anadir"]) and $_POST["anadir"]=="si")
			  {
				//print_r($_POST);
				//print_r($_POST["codi_clie"]);
				$anadir = $trabajo->anadirTrabajo2($_POST["prio"],$_POST["requ"],$_POST["proye"],
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
<title>Añadir Trabajos</title>
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
                	
                </div>	
                <h2 style="padding-top:12px;">Añadir Trabajos</h2>
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor">
                <div id="sub-contenedor">
               <!-- <div style="background:rgb(245, 245, 245); text-align:left; padding: 10px 0px 0px 10px; height:30px; border-bottom: 1px  #C0C0C0 solid;">
                	<span style="color: #003E55; font-weight:bold;">Datos de la Empresa </span>
                </div>-->
                <form name="form_trab" id="form_trab" action="add_trabajos.php" method="post">
				<div id="fila">
                	<div id="columna" style="float:left; width:33%">
                        <span class="desc">Prioridad: </span>
                        <select id="prio" name="prio" >
                        <?php 
						    $prio = $trabajo->comboPrioridad();
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
								$prio2 = $trabajo->prioridadCombo($prioridad);
								for($c=0;$c<sizeof($prio2);$c++)
								{
									echo "<option value=".$prio2[$c]['id_prio'].">".$prio2[$c]['desc_prio']."</option>";
									$prio3 = $trabajo->listarComboPrioridad($prioridad);
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
						    $creq = $trabajo->comboRequemiento();
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
								$creq2 = $trabajo->comboRequemiento2($requerimiento);
								for($b=0;$b<sizeof($creq2);$b++)
								{
									echo "<option value=".$creq2[$b]['id_requ'].">".$creq2[$b]['desc_requ']."</option>";
									$creq3 = $trabajo->listarRequemiento($requerimiento);
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
                        <textarea id="proye" name="proye" cols="35" rows="8"  maxlength="999" ></textarea>
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
                         <?php 
											echo "<option class='optSel' value='0'>Seleccione...</option>";
											echo "<option class='optSel' value='1'>ONE TIME</option>";
											echo "<option class='optSel' value='2'>Semanal</option>";
													
						?>
                       </select>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Modalidad de Trabajo: </span>
                        <select id="moda" name="moda" >
                         <?php 
						
											echo "<option class='optSel' value='0'>Seleccione...</option>";
											echo "<option class='optSel' value='1'>ONE TIME</option>";
											echo "<option class='optSel' value='2'>Semanal</option>";
												
						?>
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
                   
                  <!-- <div id="columna" style="float:left; width:25%">
                   		<span class="desc">Monto US: </span>
                       <input type="text" id="mont_us" name="mont_us" onkeyup="sumarCantidad();"  />
                   </div>
                   <div id="columna" style="float:left; width:25%">
                   		<span class="desc">Total Trabajo: </span>
                       <input type="text" id="tota_us" name="tota_us" onkeyup="sumarCantidad();"  />
                   </div>-->
                </div>
                <div id="fila">  
                   <div id="columna" style="float:left; width:33%">
                   		<span class="desc">Tiempo Estimado: </span>
                       <input type="text" id="tiem" name="tiem"  />
                   </div>
                  <?php
				  if(isset($_GET["codi_trab"])) 
				  {
				  ?>
                  <div id="columna" style="float:left; width:33%">
                        <span class="desc">¿Quienes pueden ver la Oferta?: </span>
                       <?php

						
						$sql ="select * from tb_vizualizacion_oferta where fkid_trab = ".$_GET['codi_trab'];
						$resultado = mysql_query($sql);
						if(!(mysql_num_rows($resultado)>0))
						{					
							$vsr = $trabajo->checkboxUsuarios();
							for($j=1;$j<sizeof($vsr);$j++)
						   {
						   ?>
						   <div id="conteRadio"><input type="checkbox" name="queusuario[]" value="<?php echo $vsr[$j]['id_usuario']; ?>" /><?php echo $vsr[$j]['nomb_usuario'] ?></div>
						   <?php  
						   }
						}
						if(mysql_num_rows($resultado)>0)
						{
							$visu = $trabajo->checkbox($_GET['codi_trab']);
							for($k=1;$k<sizeof($visu);$k++)
						   {
						   echo "<div id='conteRadio'><input type='checkbox' name='queusuario[]' checked='checked' value=".$visu[$k]['id_usuario']." />".$visu[$k]['nomb_usuario']."</div>";
						   	   
							   
						   }
						   $sele = $trabajo->selectCheckbok($_GET['codi_trab']);
						   for($s=0;$s<sizeof($sele);$s++)
						   {
							 echo "<div id='conteRadio'><input type='checkbox' name='queusuario[]' value=".$sele[$s]['id_usuario']." />".$sele[$s]['nomb_usuario']."</div>";
						   }
						}
					
						 ?>
                   </div>
                   <div id="columna" style="float:left; width:33%">
                        <span class="desc">Asignar Usuario</span>
                       <?php

						
						$sql1 ="select * from tb_asignacion_trabajos_actuales where fkid_trab = ".$_GET['codi_trab'];
						$resultado1 = mysql_query($sql1);
						if(!(mysql_num_rows($resultado1)>0))
						{					
							$visuAsig = $trabajo->checkboxUsuariosAsig();
							for($w=0;$w<sizeof($visuAsig);$w++)
						   {
						   ?>
						   <div id="conteRadio"><input type="checkbox" name="asigna_usuario[]" value="<?php echo $visuAsig[$w]['id_usuario']; ?>" /><?php echo $visuAsig[$w]['nomb_usuario'] ?></div>
						   <?php  
						   }
						}
						if(mysql_num_rows($resultado1)>0)
						{
							$check = $trabajo->checkboxAsig($_GET['codi_trab']);
							for($v=0;$v<sizeof($check);$v++)
						   {
						   echo "<div id='conteRadio'><input type='checkbox' name='asigna_usuario[]' checked='checked' value=".$check[$v]['id_usuario']." />".$check[$v]['nomb_usuario']."</div>";
						   	   
							   
						   }
						   $seleAsig = $trabajo->selectCheckbokAsig($_GET['codi_trab']);
						   for($u=0;$u<sizeof($seleAsig);$u++)
						   {
							 echo "<div id='conteRadio'><input type='checkbox' name='asigna_usuario[]' value=".$seleAsig[$u]['id_usuario']." />".$seleAsig[$u]['nomb_usuario']."</div>";
						   }
						}
					
						 ?>
                   </div>
                  <?php
				  }
				  ?>
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