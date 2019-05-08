<?php include("start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $pago =  new Pagos();
	  include("../controle/vSession.php");
	  $id_usuario = $_SESSION["id_usuario"];	
	  //print_r($_POST);
	  
	if(isset($_POST["anadir"]) and $_POST["anadir"] == "si" )
	  {
		  $guardar = $pago->guardarPago($_POST["usuarios"],$_POST["trabajo"],$_POST["datepickerdesde"],$_POST["datepickerhasta"],$_POST["monto"], $_POST["numero"],$_POST["recibiImagen"]);
		 
		  }	  
	if(isset($_POST["submit"])){
	if (is_uploaded_file($_FILES['imagen']['tmp_name'])) 
	{
		//revisamos que sea jpg
		if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"
			||$_FILES['imagen']['type'] == "image/JPG" || $_FILES['imagen']['type'] == "image/JPEG" || $_FILES['imagen']['type'] == "image/PNG"){
			//nuevo nombre para la imagen
			$nuevoNombre = time().".jpg";
			
//			mysql_query('INSERT INTO fichero (imagen) VALUE (\''.$nuevoNombre.'\') ');
//			$select=("Select imagen from fichero where imagen = '$nuevoNombre'");
//			if($row = mysql_fetch_array($select)){
//				echo '<img src="$row["imagen"]" width="100px">';
//				}
//						
			//movemos la imagen
			move_uploaded_file($_FILES['imagen']['tmp_name'], "comprobantes/$nuevoNombre");
			//obtenemos la inforamción
			$data = GetImageSize("comprobantes/$nuevoNombre");
			//mensaje de éxito
			//echo "<img src='images/$nuevoNombre' $data[3]> <br> imagen $nuevoNombre subida con éxito";
		}else{
			echo "Formato no válido para fichero de imagen";
		}
	} else {
		$mensaje = "Error al cargar imagen: " . $_FILES['imagen']['name'];
	}
}
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script  type="application/javascript" src="../jscript/funciones.js"></script>

<link rel="stylesheet" href="../css/jquery.ui.all.css">
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />
<title>Pagar</title>

<!--Libreri de Jquery--->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!--Fin Libreri de Jquery--->

<!--
<script language="javascript" src="../jscript/jquery-1.3.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
-->
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>

<script language="javascript">
$(document).ready(function(){
   $("#usuarios").change(function () {
           $("#usuarios option:selected").each(function () {
            id_category = $(this).val();
            $.post("subcategories.php", { id_category: id_category }, function(data){
                $("#trabajo").html(data);
            });            
        });
   })
});

     //Codigo del calendario    
     $(function() {
		$( "#datepickerdesde" ).datepicker({
		showOn: "button",
		buttonImage: "../images/calendar.gif",
		buttonImageOnly: true
		});
		});
		
		 //Codigo del calendario    
     $(function() {
		$( "#datepickerhasta" ).datepicker({
		showOn: "button",
		buttonImage: "../images/calendar.gif",
		buttonImageOnly: true
		});
		});


</script>
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
    <div id="cuerpo_general" >
    	<div id="tilulos">
        
            	<div id="botenes">
                <div style="width:200px; float:left; margin:0px 20px 0px 0px; "><!--Boton consultar--->
                    	<center>
                            <a href="reporte_pagos.php">
                                <img src="../images/ico-consu.png" border="0" width="30" />
                                <div>Pagos Realizados</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton consultar-->
                	<div style="width:60px; float:left; margin:0px 20px 0px 0px">
                    	<center>
                            <!--<a href="add_trabajos.php">
                                <img src="../images/ico-add.png" border="0" width="30" onclick="addTrabajo();" />
                                <div>Añadir</div>	
                            </a>-->
                        </center>
                    </div>
                </div>	
              
                <h2 style="padding-top:12px;">Pagar</h2>
                
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor-cliente" >

        
        <form id="formwe" enctype="multipart/form-data" name="formwe" action="pagos.php" method="post">
        <div id="fila"> 
               <div id="columna" style="float:left; width:30%">
                            <span class="desc">Comprobante:</span>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                            <input name="imagen" type="file">
                            <input type="submit" name="submit"  id='btn' value="Subir Comprobante" >
              
                </div>
                <div id="mimagen" style="float:left; width:30%"></div>
                <div id="columna" style="float:left; width:30%">
                   <?php
						if(isset($_POST["submit"]) and isset($nuevoNombre)){
						echo "<img src='comprobantes/$nuevoNombre' width='250' height='' $data[3] >";
						echo "<input type='hidden' name='valorImagen' id='valorImagen' value='$nuevoNombre'>";
						//echo $data[3];
						}
						else
						{
							$nuevoNombre=0;
						}
					?>  
                </div>
        </div>
        <div id="fila">
        	<div id="columna" style="float:left; width:25%">
                  <span class="desc">Fecha Desde:</span>
                  <input type="text" name="datepickerdesde" id="datepickerdesde" maxlength="10" size="6" class="demo"/>
            </div>
            <div id="columna" style="float:left; width:25%">
                  <span class="desc">Fecha Hasta:</span>
                  <input type="text" name="datepickerhasta" id="datepickerhasta" maxlength="10" size="6" class="demo"/>
            </div>
            <div id="columna" style="float:left; width:25%">
                        <span class="desc">Usuarios:</span>
                        <select name="usuarios" id="usuarios">
                        <?php
						$usuarios = $pago->usuarios();
							echo "<option value='0'>Seleccione</option>";
							for($i=0;$i<sizeof($usuarios); $i++)
							{
								echo "<option value=".$usuarios[$i]["id_usuario"].">".$usuarios[$i]["nomb_usuario"]." ".$usuarios[$i]["apel_usuario"]."</option>";
							}
                        ?>
                        </select>
            </div>
            <div id="columna" style="float:left; width:20%">
                        <span class="desc">Trabajos del usuario:</span>
                        <select name="trabajo" id="trabajo"></select>
            </div>
        </div>
        <div id="fila">
                    <div id="columna" style="float:left; width:25%">
                        <span class="desc">Monto a Pagar:</span>
                        <input type="text" name="monto" id="monto" maxlength="20" />
                    </div>
                	<div id="columna" style="float:left; width:25%">
                        <span class="desc">Numero de Deposito:</span>
                         <input type="text" name="numero" id="numero" maxlength="20" />
                   </div>
           </div>
          <div id="fila"> 
               <div id="columna" style="float:left; width:100%">
                          
                          <input type="hidden" id="anadir" name="anadir" value=""/>
                          <input type="hidden" id="recibiImagen" name="recibiImagen" value=""/>                          
                          <input type="submit"  onclick="enviarPago('si');"  id="btn" value="Pagar" >
              </div>
           </div>
           
          </form>
         
             
           
        
       
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