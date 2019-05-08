<?php include("start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $oferta =  new TrabajosActuales();
	  include("../controle/vSession.php");
	  
	  $usuario = $_SESSION["id_usuario"];
      
      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script  type="application/javascript" src="../jscript/funciones.js"></script>
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />

<title>Ofertas</title>
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
                <h2 style="padding-top:12px;">Ofertas</h2>
                
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor-cliente">
                <div id="sub-contenedor-cliente"> 
                <!--Muestra la lista de clientes-->
                <form name="form_ofer_actu" id="form_ofer_actu" action="registro_cliente.php" method="post">
                <input type="hidden" name="cod_uniofer" id="cod_uniofer" /> 
                <input  type="hidden" name="usuario" id="usuario" />
                <input  type="hidden" name="oferta" id="oferta" />
                <div class="fila tabla titulo">
                	<div class="columna tabla corto">ID</div>
                    <div class="columna tabla corto">Prio</div>
                    <div class="columna tabla largo">Categoria</div>
                    <div class="columna tabla largo">Trabajo</div>
                    <div class="columna tabla largo">Proyecto</div>	
                    <!--<div class="columna tabla medio">Monto BSF</div>-->
                    <div class="columna tabla medio">Total BSF</div>
                     <?php
					if($rol == 1)
					{
					?>
                    <div class="columna tabla medio">Usuario Asignado</div>
                    <?php
					}
					?>
                    
                    <div class="columna tabla corto">V/M</div>
                     <?php
					if($rol == 1)
					{
					?>
                    <div class="columna tabla corto">Elim.</div>
                     <div class="columna tabla medio">Solicitada.</div>
                    <?php
					}
					else
					{
					?>
                    <div class="columna tabla corto">Solicita</div>
                    <?php
					}
					?>
                    
                </div>
                 <?php
				 if($rol ==1)
				 {
				 
				 
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
				 $paginacion = $oferta->paginadoOfertas($inicio);
				 //Instanciamos la funcion para mostrar todos los registro de los clientes
				 $row = $oferta->listarOfertas();
				 //Declaramos a ind con un valor 0
				 $ind=0;
				 for($i=0; $i<sizeof($paginacion); $i++)
                  {
					//Indice de la tabla
                    $ind= $ind + 1;
                    ?>
                        <div class="fila tabla filaContenido">
                        <a href="javascript:void(0);" onclick="window.location='modificar_ofertas.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'">
                        <div class="columna tabla corto contenido" ><?php echo $row[$i]["id_trab"] ?></div>
                        <div class="columna tabla corto contenido" ><?php echo substr(ucwords($row[$i]["fkid_prio"]),0,20);?></div>
                         <?php
						if ($row[$i]["fkid_requ"] !=0)
						{
							$requerimiento = $row[$i]["fkid_requ"];
							//Consulta la BD 		
							$respuesta=mysql_query("select * from tb_requerimientos where id_requ = $requerimiento");
							while($sel =mysql_fetch_array($respuesta))
							{
							?>
								<div class="columna tabla largo contenido" ><?php echo $sel["desc_requ"];?></div>
							<?php
							}
						}
						else
						{
							?>
								<div class="columna tabla largo contenido" >Por asignar Categoria</div>
							<?php
							}
						?> 
                        
                        
                        
                        <div class="columna tabla largo contenido" ><?php if (strlen($row[$i]["trab_trab"]) >= 250){echo  substr(wordwrap(ucwords($row[$i]["trab_trab"]), 250, "<br>",1),0,250)." <span class='leerMas'>Leer mas.</span>";}else{echo  substr(wordwrap(ucwords($row[$i]["trab_trab"]), 250, "<br>",1),0,250);}?></div>
                        <div class="columna tabla largo contenido" ><?php if (strlen($row[$i]["proy_trab"]) >= 250){echo  substr(wordwrap(ucwords($row[$i]["proy_trab"]), 250, "<br>",1),0,250)." <span class='leerMas'>Leer mas.</span>";}else{echo  substr(wordwrap(ucwords($row[$i]["proy_trab"]), 250, "<br>",1),0,250);}?></div>
                        
                        <!--<div class="columna tabla medio contenido"><?php echo number_format($row[$i]["mont_bsf_trab"], 2, ',', '.')." Bsf"?></div>-->
                        <div class="columna tabla medio contenido"><?php echo number_format($row[$i]["tota_vef_trab"], 2, ',', '.')." Bsf"?></div>
						<?php
						
						if ($row[$i]["id_usuario"] !=0)
							{
								$id_usuario = $row[$i]["id_usuario"];
								//Consulta la BD 		
								$respuesta=mysql_query("select * from tb_usuarios where id_usuario = $id_usuario");
								while($sel =mysql_fetch_array($respuesta))
								{
								?>
								<div class="columna tabla medio contenido" ><?php echo $sel["nomb_usuario"].' '.$sel["apel_usuario"];?></div>
								<?php
								}
							}
							else
							{
								?>
								<div class="columna tabla medio contenido" >Pendiente por Ofertar</div>
								<?php
								
								}
						?>  
                        
                        <!--<div class="columna tabla medio contenido" ><?php echo $row[$i]["id_usuario"]?></div>-->
                        <div class="columna tabla corto contenido"><img src="../images/modificar.png" style="cursor:pointer;" width="32" title="Modificar" align="center"/></div>
                        </a>
						<div class="columna tabla corto contenido"><img src="../images/eliminar.png"   style="cursor:pointer;" title="Eliminar" width="32" align="center" onclick="eliminarOfer(<?php echo $row[$i]["id_trab"]?>)"></div>
                        <?php
							$sql ="select * from tb_trabajos_actuales as A inner join tb_solicitudes as B on A.id_trab = B.fkid_trab where A.id_trab = ".$row[$i]["id_trab"];
							$resultado = mysql_query($sql);
							if(mysql_num_rows($resultado)>0)
							{
								?>
								<div class="columna tabla medio"><img src="../images/logo.png"   style="cursor:pointer;" title="" width="32" align="center" ></div>
							<?php
                            }
							else
							{
							?>
								<div class="columna tabla medio"><img src="../images/ico_cerrada.png"   style="cursor:pointer;" title="" width="32" align="center" ></div>
							<?php
							}
							
						 ?>
                        </div>
                        
                   <?php
                    }
				 }//Final de la condicion
				 else
				 {
				
                /*************************************************************/
                /*************************************************************/
                /*************************************************************/
                /*************************************************************/
                
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
                 $paginacion = $oferta->paginadoOfertasUsu($inicio,$usuario);
                 //Instanciamos la funcion para mostrar todos los registro de los clientes
                 $row = $oferta->listarOfertasUsu($usuario);
                 //Declaramos a ind con un valor 0
                 $ind=0;
                 for($i=0; $i<sizeof($paginacion); $i++)
                  {
                    //Indice de la tabla
                    $ind= $ind + 1;
                    ?>
                        <div class="fila tabla filaContenido">
                        <a href="javascript:void(0);" onclick="window.location='modificar_ofertas.php?codi_trab=<?php echo $row[$i]["id_trab"]?>'">
                        <div class="columna tabla corto contenido" ><?php echo $row[$i]["id_trab"] ?></div>
                        <div class="columna tabla corto contenido" ><?php echo substr(ucwords($row[$i]["fkid_prio"]),0,20);?></div>
                         <?php
                        if ($row[$i]["fkid_requ"] !=0)
                        {
                            $requerimiento = $row[$i]["fkid_requ"];
                            //Consulta la BD        
                            $respuesta=mysql_query("select * from tb_requerimientos where id_requ = $requerimiento");
                            while($sel =mysql_fetch_array($respuesta))
                            {
                            ?>
                                <div class="columna tabla largo contenido" ><?php echo $sel["desc_requ"];?></div>
                            <?php
                            }
                        }
                        else
                        {
                            ?>
                                <div class="columna tabla largo contenido" >Por asignar Categoria</div>
                            <?php
                            }
                        ?> 
                        
                        
                        
                        <div class="columna tabla largo contenido" ><?php if (strlen($row[$i]["trab_trab"]) >= 250){echo  substr(wordwrap(ucwords($row[$i]["trab_trab"]), 250, "<br>",1),0,250)." <span class='leerMas'>Leer mas.</span>";}else{echo  substr(wordwrap(ucwords($row[$i]["trab_trab"]), 250, "<br>",1),0,250);}?></div>
                        <div class="columna tabla largo contenido" ><?php if (strlen($row[$i]["proy_trab"]) >= 250){echo  substr(wordwrap(ucwords($row[$i]["proy_trab"]), 250, "<br>",1),0,250)." <span class='leerMas'>Leer mas.</span>";}else{echo  substr(wordwrap(ucwords($row[$i]["proy_trab"]), 250, "<br>",1),0,250);}?></div>
                       <!-- <div class="columna tabla medio contenido"><?php echo number_format($row[$i]["mont_bsf_trab"], 2, ',', '.')." Bsf"?></div>-->
                        <div class="columna tabla medio contenido"><?php echo number_format($row[$i]["tota_vef_trab"], 2, ',', '.')." Bsf"?></div>
                        <div class="columna tabla corto contenido"><img src="../images/modificar.png" style="cursor:pointer;" width="32" title="Modificar" align="center"/></div>
                        </a>
                        <div class="columna tabla corto contenido"><img src="../images/logo.png"   style="cursor:pointer;" title="Solicitar" width="32" align="center" onclick="sorteo(<?php echo $usuario?>,<?php echo $row[$i]["id_trab"]?>);" /></div>
                        <input  type="hidden" name="solicitar" id="solicitar"  value="si" />
                        
                         </div>
                       
                   <?php
                    }
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