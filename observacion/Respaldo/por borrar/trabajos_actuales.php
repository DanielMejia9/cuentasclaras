<?php include("start.php");
	  include("class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $trabajo =  new TrabajosActuales();
	  include("controle/vSession.php");
	  
	  
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
                <h2 style="padding-top:12px;">Trabajos actuales</h2>
                
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor-cliente">
                <div id="sub-contenedor-cliente"> 
                <!--Muestra la lista de clientes-->
                <form name="form_trab_actu" id="form_trab_actu" action="registro_cliente.php" method="post">
                <input type="hidden" name="cod_unitrab" id="cod_unitrab" /> 
                <table widht='100%' id='Tabla'  name='Tabla' style='display:' class='tbRegClie' border='0' align='center' rules="all"  >
                <section>
                    <thead>
                    <tr>
                        <th class="tbDinami">ID</th>
                        <th class="tbDinami">Prio</th>
                        <!--<th class="tbDinami">Rquerimiento 1</th> 
                        <th class="tbDinami">Rquerimiento 2</th>  
                        <th class="tbDinami">Proyecto</th>-->
                        <th class="tbDinami">Trabajo</th>
                        <!--<th class="tbDinami">Forma de Pago</th>
                        <th class="tbDinami">Modalidad</th> 
                        <th class="tbDinami">Observación</th> 
                        <th class="tbDinami">Link</th>--> 
                        <th class="tbDinami">Cant.</th> 
                        <th class="tbDinami">Monto</th> 
                        <th class="tbDinami">Total</th> 
                        <th class="tbDinami">Tiempo Estimado</th> 
                        <th>V/M</th>
                        <th>Elim.</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
				 //Creamos una condicion para darle un valor al parametro en enviado a la funcion del Paginado
				 if(isset($_GET["posicion"]))
				 {
					 $inicio = $_GET["posicion"];
					 }
				 		else
						 {
							 $inicio=0;
							 }
				 //Llamamos a la function de paginacion
				 $paginacion = $trabajo->paginadoTrabajos($inicio);
				 //Instanciamos la funcion para mostrar todos los registro de los clientes
				 $row = $trabajo->listarTrabajos();
				 //Declaramos a ind con un valor 0
				 $ind=0;
				 
				 for($i=0; $i<sizeof($paginacion); $i++)
                  {
					//Indice de la tabla
                    $ind= $ind + 1;
					
                    ?>
                        <tr <?php $ind ?> class="fila">
                        <td style="padding-left:14px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["id_trab"] ?></a></td>	
                        <td style="padding-left:10px" title="<?php echo ucwords($row[$i]["prio_trab"])?>"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo substr(ucwords($row[$i]["prio_trab"]),0,20);?></a></td>
                        <!--<td style="padding-left:10px" width="100px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["requ_1_trab"]?></a></td>
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo substr($row[$i]["requ_2_trab"],0,50)."...";?></a></td>
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo ucwords($row[$i]["proy_trab"])?></a></td>-->
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo ucwords($row[$i]["trab_trab"])?></a></td>
                        <!--<td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["form_trab"]?></a></td>
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["moda_trab"]?></a></td>
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["obse_trab"]?></a></td>
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["link_trab"]?></a></td>-->
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["cant_trab"]?></a></td>
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["mont_bsf_trab"]?></a></td>
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["tota_trab"]?></a></td>
                        <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><?php echo $row[$i]["tiem_esti_trab"]?></a></td>
                        <td ><a href="javascript:void(0);" onclick="window.location='modificar_trabajos.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'"><img src="images/modificar.png" style="cursor:pointer;" width="32" title="Modificar" align="center"/></td>
                        <td><img src="images/eliminar.png"   style="cursor:pointer;"title="Eliminar" width="32" align="center" onclick="eliminarTrab(<?php echo $row[$i]["id_trab"]?>)"></td>
                        </tr>
                   <?php
                    }
                    ?>
						</section>
                	</table>
                </form>
                	
                
                    </div><!--Sub-Contenedor-->
                    	<div id="paginacion"><!-- Paginacion--> 
						<?php
                        if($inicio==0)
                        {
                        ?><span class="paginado">Anteriores</span><?php
                            }
                            else
                            {
                             $anterior =$inicio-10;
                             ?>
                             <a href="?posicion=<?php echo $anterior ?>" title="Anteriores"  class="paginado">Anteriores</a>
                             <?php
                            }
                            
                        ?>
                          &nbsp;&nbsp;
                        <?php
                            if(count($paginacion)>=10)
                            {
                                $proxima = $inicio+10;
                                ?>
                                <a href="?posicion=<?php echo $proxima;?>" title="Siguiente"  class="paginado">Siguientes</a>
                                <?php
                                }
                                else
                                {
                                 ?><span class="paginado">Siguientes</span>
                                    <?php
                                }
                            ?>
                    </div><!-- Paginacion--> 
                   
        	</div><!--Contenedor-->
            
       </div><!--Cuerpo general--->
            </div>
        </div>
    </div>
</div>    
<!--<div id="pie">
            	Desarrollado por Tecnologia y Desarrollo Jirehpro, C.A. J-40135922-1
                Para soporte Técnico contactenos al 0212.888.81.12 - Sitio Web: wwww.jirehpro.com
</div><!--Pie-->
    </center>
    

</body>
</html>