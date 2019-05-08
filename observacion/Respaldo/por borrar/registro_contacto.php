<?php include("start.php");?>
<?php require("conexion.php"); ?>
<?php include("controle/vSession.php");?>
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


<title>Registro de usuario</title>
</head>
<body <?php echo $style;?>>
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
    <div id="cuerpo_general"><br />
        <form name="form_user" id="form_user" action="modificar_reg.php" method="post">
        
            <table border="0" width="650" height="" align="center" class="regUser">
                <tr>
                    <td align="center" colspan="2">
                    	<h2>Datos de Contactos</h2><hr />
                    </td>
                </tr>
                <tr>
                	<td width="200">
                    	<img src="images/user.png"  width="200" />
                    </td>
                    <td align="center">
                    	<table border="0" align="center">
                        	<tr>
                            	<td>Nombres:</td>
                                <td align="left"><input type="text" name="nom_cont" id="nom_cont" maxlength="50" size="20" /></td>
                            </tr>
                            <tr>
                            	<td> Apellidos:</td>
                                <td> <input type="text" name="ape_cont" id="ape_cont" maxlength="50" size="20" /></td>
                            </tr>
                            <tr>
                            	<td>Edad:</td>
                                <td> <input type="text" name="eda_cont" id="eda_cont" maxlength="8" size="20" /></td>
                            </tr>
                            <tr>
                            	<td>Nº Telefono:</td>
                                <td> <input type="text" name="tel_cont_local" id="tel_cont_local" maxlength="50" size="20" class=""/></td>
                            </tr>
                            <tr>
                            	<td>Nº Telefono (opcional):</td>
                                <td> <input type="text" name="tel_cont_cel" id="tel_cont_cel" maxlength="50" size="20" class=""/></td>
                            </tr>
                            <tr>
                            	<td>Dirección</td>
                                <td> <input type="text" name="dir_cont" id="dir_cont" maxlength="50" size="20" class=""/></td>
                            </tr>
                            <tr>
                            	<td>¿Que te gustaría hacer?:</td>
                                <td> <input type="text" name="que_cont" id="que_cont" maxlength="50" size="20" class=""/></td>
                            </tr>
                            <tr>
                            	<td>Correo:</td>
                                <td> <input type="text" name="cor_cont" id="cor_cont" maxlength="50" size="20" class=""/></td>
                            </tr>
                            </tr>
                            <!--<tr>
                            	<td> Permisología:</td>
                                <td>
                                    <select name="per_usu" id="per_usu">
                                    <option></option>
                                    <option value="1">SuperAdministrador</option>
                                    <option value="2">Administrador</option>
                                    <option value="3">Especial</option>
                                    <option value="4">Empleado</option>
                                   </select></td>
                            </tr>-->
                            
                        </table>
                    </td>
                </tr>              
                 <tr>
                    <td colspan="2" style=" text-align:center">
                        <input type="button" id="btn" name="username" value="Registrar"  onclick="validaRegcont();"/>
                        <input type="reset" id="btn" value="Limpiar" />
                        <input type="button" id="btn" name="verUser" value="Ver/Oculta Lista"  Onclick="verUsuer();"/>
                        <input  type="hidden" name="mostrUser" id="mostrUser"  />
                        
                        
                    </td>
                </tr>
            </table>
            
            
            <!-- Rescata el valor del Codigo ID del usuario-->
            <input type="hidden" name="cod_uni" id="cod_uni" />            
            
            <?php
			
			
		//$mostrUser = $_POST["mostrUser"];
//		if ($mostrUser == 1){
	

	

        $selec= mysql_query('SELECT * FROM tb_cont_agen');
		echo "<table widht='100%' id='Tabla1'  name='Tabla1' style='display:none' class='regUser' border='0'   align='center' rules='all'>";
		echo "</br>";
		echo "<tr><h2 style='display:none' id='titulo1'>Lista de Usuarios</h2> \n";
		
		echo "<td><div class='tbDinami'><b>ID</b></td>";
		echo "<td><div class='tbDinami'><b>Nombres</b></td>";
		echo "<td><div class='tbDinami'><b>Apellidos</b></td>"; 
		echo "<td><div class='tbDinami'><b>Edad</b></td>";
		echo "<td><div class='tbDinami'><b>Telefono local</b></td>";
		echo "<td><div class='tbDinami'><b>Telefono Celular</b></td>"; 
		echo "<td><div class='tbDinami'><b>Dirección</b></td>";  
		echo "<td><div class='tbDinami'><b>¿Que te gustaría hacer?</b></td>";  
		echo "<td><div class='tbDinami'><b>Correo</b></td>";
		echo "<td><b>Mod.<b></td>";
		echo "<td><b>Elim.<b></td>";
		//echo "<td><b>Marcar.<b></td>";
		echo "</tr> \n";
		$i=0;
		while($row = mysql_fetch_array($selec))
		{
			$i= $i + 1;
			echo "<tr $i class=''><td  style='padding:7px'>";
			echo "$row[IDCONT]</td>";
			
            echo "<input type='hidden' name='codi_uni'  id='codi_uni' value='$row[IDCONT]$i' />";
			
			
			echo "<td style='padding:7px'>";
			echo "$row[NOM_CONT]";
			
			echo "<td style='padding:7px'>";
			echo "$row[APE_CONT]";
			
			echo "<td style='padding:7px'>";
			echo "$row[EDA_CONT]";
			
			echo "<td style='padding:7px'>";
			echo "$row[TEL_CONT_LOC]";
			
			echo "<td style='padding:7px'>";
			echo "$row[TEL_CONT_CEL]";
			
			echo "<td style='padding:7px'>";
			echo "$row[DIR_CONT]";
			
			echo "<td style='padding:7px'>";
			echo "$row[GUS_CONT_HAC]";
			
			echo "<td style='padding:7px'>";
			echo "$row[COR_CONT]";

			echo "<td><img src='images/modificar.png' width='20' title='Modificar' align='center' onclick='modificarReg($row[id])' />";
			echo "<td><a href='#'><img src='images/eliminar.png' title='Eliminar' width='20' align='center' onclick='eliminarReg($row[id]);'></a>";
			//echo "<td align='center'><input type='checkbox' name='marcar'/>";
			echo "</tr>";
			
			
			}
    		echo "</table>";
		


			?>
           
        
        </form>
       </div>
    </center>
	
	

</body>
</html>