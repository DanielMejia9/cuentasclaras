<?php 
require_once("class/class.php");
include("start.php");
$conexion = new Conectar();
$conectar = $conexion->conecta();

include("controle/vSession.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<!--Libreri de Jquery--->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!--Fin Libreri de Jquery--->

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
<title>Facturacion</title>
</head>
<body <?php echo $style;?> >
	<div id="logo">
      	<img src="images/Jirehpro_logo.png" width="245" />
    </div>
    <div id="liDet">
    	<span style="padding-left:5px"><?php echo ("Bienvenido! "). ucwords ($nomUser);?></span>
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
	   <?php include("include/menu.php");?>
    <center>
    <div id="cuerpo_general">
    <div id="contenedor_fact">
        <div id="sub-contenedor_fact">

        <form name="form_fact" id="form_fact" action="registrar_factura.php" method="post">
            <table border="0" width="100%" height="150" align="center" class="regUser" id="tablaFactura">
                <tr>
                    <td>
                    	<h2>Facturación - Cliente</h2><hr />
                    </td>
                </tr>
                <tr>
                	<td class="c1">
                		Numero de Control: <input type="text" name="numero_control" id="numero_control" size="5" />
                		Numero de Factura: <input type="text" name="numero_factura" id="numero_factura" size="5"  />
                    </td>
                
                </tr>
                <tr>
                    <td class="c2">
                    <?php
					
							
						//recoge variable de la url
						$valor = $_GET["valor"];
						
						//Realiza la consulta en la BD
						$buscar = mysql_query("select * FROM tb_regi_cli WHERE codi_clie = '".$valor."'");
							//Creamos el Array o Arreglo
						$row = mysql_fetch_array($buscar);
                        

						?>
                    	<input type="hidden" id="codigo-cliente" name="codigo-cliente" value="<?php echo $row["codi_clie"];?>" />
                        Nombre del Cliente:  
                       	 <input type="hidden" name="valSelect" id="valSelect" />
                         <select name="sele_clie" id="sele_clie" onchange="onSelect(this.value)" value="<?php echo $row["codi_clie"];?>"  > 
						<?php
								//Consulta la BD 		
								$respuesta=mysql_query("select codi_clie, nomb_clie from tb_regi_cli");
								//Se realiza la condicion para saber el valor de la 
								//variable $valor
								if(($valor ==0))
								{
									echo '<option value="0" >Seleccione</option>';
									while($select =mysql_fetch_array($respuesta)){
										echo '
											<option value="'.$select["codi_clie"].'"> 
											'.$select["nomb_clie"].'</option> ';
											}
								}
								else{
										echo '<option  value="'.$row["codi_clie"].'">'.$row["nomb_clie"].'</option> ';
											while($select =mysql_fetch_array($respuesta)){
											
											echo '<option value="'.$select["codi_clie"].'">'.$select["nomb_clie"].'</option>';
											}
										  }
									
									
									?>
                        </select>
                        <input type="hidden" name="nombrecliente" id="nombrecliente"  value="<?php echo $row["nomb_clie"] ?>" />
                        
                        Rif: <input type="text" name="rifEmp" value="<?php echo $row["rif_clie"] ?> " id="rifEmp" maxlength="12" size="12" />
                        NIT: <input type="text" name="nitEmp" value="<?php echo $row["nit_clie"] ?>" id="nitEmp" maxlength="15" size="11" />
                        Fecha: <input type="text" name="datepicker" id="datepicker" maxlength="10" size="6" class="demo"/>
                    </td>
                </tr>
                <tr>
                    <td class="c3">
                        Dirección: <input type="text" name="dirEmp" value="<?php echo $row["dire_clie"] ?>" id="dirEmp" maxlength="200" size="50" />
                        Pais: <input type="text" name="paisEmp"  value="<?php echo $row["pais_clie"] ?>" id="paisEmp" maxlength="12" size="15" />
                        Ciudad: <input type="text" name="ciuEmp" value="<?php echo $row["ciud_clie"] ?>" id="ciuEmp" maxlength="50" size="16" />
                    </td>
               </tr>
               <tr>
               		<td class="c4">
                        Estado: <input type="text" name="estEmp"  value="<?php echo $row["esta_clie"] ?>" id="estEmp" maxlength="12" size="20" />
                        Telefonos*: <input type="text" name="telEmpr"   value="<?php echo $row["tele_clie"] ?>"id="telEmpr" maxlength="11" size="15" />
                         Telefonos(opcional): <input type="text" name="telEmpropc"  value="<?php echo $row["tele_clie_opci"] ?>" id="telEmpropc" maxlength="11" size="15" />
                        Contr: 
                       <input type="text" name="contribuyente" value="<?php echo $row["cont_espe_clie"] ?>" maxlength="2" size="4" />
                       
                      
                    </td>
                </tr>
                <tr>
                	<td class="c4">
                		Descrpcion de la Factura: <input type="text" name="descripcion" id="descripcion" size="80"  />
                    </td>
                </tr>
            </table> 
            
            <table name="factura" id="factura" widht="900" class="descFact" border="0"   align="center" rules="all">
                 <tr height="20px" style="background:#666; color:#FFF; font-weight:bold;">	
                     <td width="100" align="center"><div><b>Cantidad</b></td>
                     <td width="500" align="center"><div><b>Descripcion</b></td>
                     <td width="100" align="center"><div><b>Precio</b></td>
                     <td width="100" align="center"><div><b>Total</b></td>
                 </tr>
            
            
        <?php

		$sumaTotal = 0;
		$indice = 1;
		$multi = 10;
		$t = 0;
		$z = 1;
		//variable para identificar el valor de las columnas
        $c = 0;
		for ($i = 1; $i <= $multi; $i++)
		{
			//$i= $i + 1;
			echo "<tr>";			
			
			for($j = 1; $j <= $indice; $j++){
			$t = $t + 1;
			$z = $z + 1;
            //variable para identificar el valor de las columnas
            $c = $c + 1;
			?>
			<input type="hidden" name="identy"  id="identy" value="<?php echo $t?>" />
			
			<td width="100" align="center">
				<input  type="text"  class="inputTxt" name="txtCant<?php echo $t?>" id="txtCant<?php echo $t?>"  onkeypress="return validarn(event)" onKeyup="suma(<?php echo $t?>,<?php echo $z?>)"/>
			</td>
            <td width="500" align="left">
				<input type="text" name="txtDesc<?php echo $t?>" class="inputDes" id="txtDesc<?php echo $t?>" />
			</td>
			<td width="100" align="center">
				<input type="text" name="txtPrec<?php echo $t?>"  class="inputTxt" id="txtPrec<?php echo $t?>" onkeypress="return validarn(event)" onmousemove="sumaTotales()" onKeyup="suma(<?php echo $t?> , <?php echo $z?>)"/>
			</td>
            <td id="idCol<?php echo $c;?>" width="100" align="center">
            	<input type="text" name="txtTota<?php echo $t?>" class="inputTxt" value=""   id="txtTota<?php echo $t?>" />
                <input type="hidden" name="valorsuma<?php echo $t?>" id="valorsuma<?php echo $t?>" value="0"/>
            </td>

            
            <?php
			
			
			}

			echo "</tr>";
		
			}
			
			
			
			
			?>
             <tr>
                	<td  colspan="2"></td>
                    <td align="">Sub - Total</td>
                    <td align="" ><input type="text" class="inputTxt" id="subTotal"  name="subTotal" /></td>
                    <!--<td align="" ><input type="text" class="inputTxt" id="subTotal" value="<?php echo $sumaTotal?>"/></td>-->
               </tr>
               <tr>
                	<td  colspan="2"></td>
                    <td align="">I.V.A (12%)</td>
                    <td align=""><input type="text" class="inputTxt" id="ivaRes" name="ivaRes"/></td>
                    
               </tr>
               <tr>
                	<td  colspan="2"></td>
                    <td align="">Total General</td>
                    <td align=""><input type="text" class="inputTxt" id="genTotal" name="genTotal"/></td>
                    
               </tr>
            
            <?php
    		echo "</table>";
		
		?>
        <div>
        	<input type="button" value="Guardar PDF" id="btnFactu" name="guardar"  onclick="guardarFactura();"/> 
           	<input type="button" value="Imprimir" id="btnFactu"  name="imprimir" onclick="imprimirFactura();"/>
        	<input type="button" value="Registrar" id="btnFactu" name="registrar" onclick="validarFactura();"/>
        </div>
            
        </form>
        
       </div><!--Sub-Contenedor-->
        	</div><!--Contenedor-->
            
       </div><!--Cuerpo general--->
       <div id="pie">
       			<?php include("include/piedepagina.php"); ?>
            	
        </div><!--Pie-->
    </center>
	
</body>
</html>