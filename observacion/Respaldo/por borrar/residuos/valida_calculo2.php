<?php
include("start.php");
require("conexion.php");
function quitar($mensaje)
{
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje;
}
if(trim($HTTP_POST_VARS["rif"]))
{
	// Puedes utilizar la funcion para eliminar algun caracter en especifico
	//$usuario = strtolower(quitar($HTTP_POST_VARS["usuario"]));
	//$password = $HTTP_POST_VARS["password"];
	// o puedes convertir los a su entidad HTML aplicable con htmlentities
	$rif = strtolower(htmlentities($HTTP_POST_VARS["rif"], ENT_QUOTES));
	$result = mysql_query('SELECT cod_clientes, nom_empresa, rif_empresa, dir_empresa, cont_especial, FROM usuarios WHERE rif_empresa=\''.$rif.'\'');
	if($row = mysql_fetch_array($result)){
		if($row["rif_empresa"] == $rif){
			
			$esp =" ";
			$_SESSION["k_username"] =$row['nombre'].$esp.$row['apellido'].$esp;
			$_SESSION["id"] =$row['email'];
			
			//echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
			//echo '<a href="index.php">Index</a></p>';
			//Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
			/*Ingreso exitoso, ahora sera dirigido a la pagina principal.*/
			?>
			<SCRIPT LANGUAGE="javascript">
			location.href = "index.php";
			</SCRIPT>
			<?php
		}
		else
		{
			?>
				<SCRIPT LANGUAGE="javascript">
				location.href = "error.php";
				</SCRIPT>
			<?php	
		}
	}
	else
	{
			?>
				<SCRIPT LANGUAGE="javascript">
				location.href = "error.php";
				</SCRIPT>
			<?php
	}
	mysql_free_result($result);
}
else
{
			?>
				<SCRIPT LANGUAGE="javascript">
				location.href = "error.php";
				</SCRIPT>
			<?php
	//echo 'Debe especificar un usuario y password';
}
mysql_close();
?>
