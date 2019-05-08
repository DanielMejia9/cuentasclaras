<?php include("start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $usuarios =  new TrabajosActuales();
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
<title>Usuarios</title>
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
                            <a href="usuarios.php">
                                <img src="../images/ico-consu.png" border="0" width="30" />
                                <div>Consulta</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton consultar-->
                	<div style="width:60px; float:left; margin:0px 20px 0px 0px"><!--Boton Añadir--->
                    	<center>
                            <a href="add_usuarios.php">
                                <img src="../images/ico-add.png" border="0" width="30" />
                                <div>Añadir</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton añadir-->
                    
                </div>	
                <h2 style="padding-top:12px;">Usuarios</h2>
                
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor-cliente">
                <div id="sub-contenedor-usuario"> 
                <!--Muestra la lista de clientes-->
                <form name="form_usua_actu" id="form_usua_actu" action="registro_cliente.php" method="post">
                <input type="hidden" name="cod_uniusua" id="cod_uniusua" /> 
                
                <div class="fila tabla titulo">
                	<div class="columna tabla medio">ID</div>
                    <div class="columna tabla medio">Nombre</div>
                    <div class="columna tabla medio">Apellido</div>
                    <div class="columna tabla medio">Cedula</div>
                    <div class="columna tabla largo">Correo</div>
                    <div class="columna tabla largo">Telefonos</div>
                    <div class="columna tabla largo">Telefonos</div>
                    <div class="columna tabla medio">Roles</div>
                    <div class="columna tabla corto">V/M</div>
                    <div class="columna tabla corto">Elim.</div>
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
				 $paginacion = $usuarios->paginadoUsuarios($inicio);
				 //Instanciamos la funcion para mostrar todos los registro de los clientes
				 $row = $usuarios->listarUsuarios();
				 //Declaramos a ind con un valor 0
				 $ind=0;
				 
				 for($i=0; $i<sizeof($paginacion); $i++)
                  {
					//Indice de la tabla
                    $ind= $ind + 1;
					
                    ?>
                        
                        <div class="fila tabla filaContenido">
                        <a href="javascript:void(0);" onclick="window.location='modificar_usuarios.php?codi_trab=<?php echo $row[$i]["id_usuario"]?>'">
                            <div class="columna tabla medio contenido" ><?php echo $row[$i]["id_usuario"] ?></div>
                            <div class="columna tabla medio contenido" ><?php echo $row[$i]["nomb_usuario"] ?></div>
                            <div class="columna tabla medio contenido" ><?php echo $row[$i]["apel_usuario"] ?></div>
                            <div class="columna tabla medio contenido" ><?php echo $row[$i]["cedu_usuario"] ?></div>
                            <div class="columna tabla largo contenido" ><?php echo $row[$i]["corr_usuario"] ?></div>
                            <div class="columna tabla largo contenido" ><?php echo $row[$i]["tele_usuario"] ?></div>
                            <div class="columna tabla largo contenido" ><?php echo $row[$i]["tele_opci_usuario"] ?></div>
                              <?php
								$rol = $row[$i]["id_rol"];
								//Consulta la BD 		
								$respuesta=mysql_query("select * from tb_roles where id_rol = $rol");
								while($sel =mysql_fetch_array($respuesta))
								{
								?>
									<div class="columna tabla medio contenido" ><?php echo $sel["desc_rol"];?></div>
								<?php
								}
								?>    
                            <div class="columna tabla corto contenido"><img src="../images/modificar.png" style="cursor:pointer;" width="32" title="Modificar" align="center"/></div>
                        </a>
                        <div class="columna tabla corto contenido"><img src="../images/eliminar.png"   style="cursor:pointer;" title="Eliminar" width="32" align="center" onclick="eliminarUsua(<?php echo $row[$i]["id_usuario"]?>)"></div>
                        </div>
                   <?php
                    }
                    ?>

                </form>
                	
                
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