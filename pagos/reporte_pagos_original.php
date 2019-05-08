<?php include("start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $pago =  new Pagos();
	  include("../controle/vSession.php");
	  $id_usuario = $_SESSION["id_usuario"];	
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
<title>Trabajo Actuales</title>
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
                <h2 style="padding-top:12px;">Pago Realizados</h2> 
        </div>
    	<div id="contenedor-cliente">

            	<center>
                <div id="sub-contenedor-cliente"> 
                <!--Muestra la lista de clientes-->
                <form name="form_trab_actu" id="form_trab_actu" action="registro_cliente.php" method="post">
                <input type="hidden" name="cod_unitrab" id="cod_unitrab" /> 

                <div class="fila tabla titulo">
                	<div class="columna tabla medio">Id</div>
                    <div class="columna tabla medio">Usuario</div>
                    <div class="columna tabla largo">Trabajo</div>
                    <div class="columna tabla medio">Fecha desde</div>
                    <div class="columna tabla medio">Fecha Hasta</div>
                    <div class="columna tabla medio">Monto </div>
                    <div class="columna tabla medio">N° Deposito</div>
                    <div class="columna tabla medio">Imagen</div>  
                    <div class="columna tabla medio">Elim.</div>  
                </div> 
      
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
				 $paginacion = $pago->paginadoPagos($inicio);
				 //Instanciamos la funcion para mostrar todos los registro de los clientes
				 $row = $pago->reportePagos();
				 //Declaramos a ind con un valor 0
				 $ind=0;
				 
				 for($i=0; $i<sizeof($paginacion); $i++)
                  {
					//Indice de la tabla
                    $ind= $ind + 1;
					
                    ?>
                    
                        <div class="fila tabla filaContenido">
                        <div class="columna tabla medio contenido" ><?php echo $row[$i]["fkid_trab"] ?></div>
                        <div class="columna tabla medio contenido" ><?php echo $row[$i]["nomb_usuario"] ?></div>
                        <div class="columna tabla largo contenido" ><?php echo $row[$i]["trab_trab"] ?></div>
                        <div class="columna tabla medio contenido" ><?php echo $row[$i]["fecha_desde"] ?></div>
                        <div class="columna tabla medio contenido" ><?php echo $row[$i]["fecha_hasta"] ?></div> 
                        <div class="columna tabla medio contenido" ><?php echo number_format($row[$i]["monto_depo"], 2, ',', '.')." Bsf" ?></div>
                        <div class="columna tabla medio contenido" ><?php echo $row[$i]["nume_depo"] ?></div>
                        <?php 
						if($row[$i]["img_depo"] !="")
						{
						?>
                        <div class="columna tabla medio contenido" ><a target="_blank" href="comprobantes/<?php echo $row[$i]["img_depo"] ?>"><img src="comprobantes/<?php echo $row[$i]["img_depo"] ?>" width="20"  /></a></div>  
                        <?php
						}
						else
						{?>
						<div class="columna tabla medio contenido" ><img src="../images/no-image.png" width="50"/></div>	
						<?php }
                        ?>
                        <div class="columna tabla medio contenido"><img src="../images/eliminar.png"   style="cursor:pointer;" title="Eliminar" width="32" align="center" onclick="eliminarPagos(<?php echo $row[$i]["id_pago"]?>)"></div>
                        </div>
                     
                    

                   <?php
                    }
                    ?>
                </form>
                </center>	
                
                    </div><!--Sub-Contenedor-->

        	</div><!--Contenedor-->
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
                </form>
				<center>
                
              </div><!--Sub-Contenedor-->
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