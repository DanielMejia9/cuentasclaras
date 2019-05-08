 <?php
include("include/start.php");
include("class/class.php");

//Conexion a la BD
$conecta = new Conectar();
$con =  $conecta->conecta();

function quitar($mensaje)
{
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje;
}

	

	
	
$password = md5(trim($_POST["password"]));
$usuario = trim($_POST["usuario"]);

$result = mysql_query('SELECT id_usuario,pass_usuario, nomb_usuario, apel_usuario,id_rol FROM tb_usuarios WHERE nomb_usuario=\''.$usuario.'\'');
	if($row = mysql_fetch_array($result)){
		if($row["pass_usuario"] == $password){
			
			$esp =" ";
			$_SESSION["k_username"] =$row['nomb_usuario'].$esp.$row['apel_usuario'].$esp;
			$_SESSION["id"]  = $row['nomb_usuario'];
			$_SESSION["rol"] = $row['id_rol'];
			$_SESSION["id_usuario"] = $row['id_usuario'];
			
			//echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
			//echo '<a href="index.php">Index</a></p>';
			//Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
			/*Ingreso exitoso, ahora sera dirigido a la pagina principal.*/
			?>
			<SCRIPT LANGUAGE="javascript">
			location.href = "modulo.php";
			</SCRIPT>
			<?php
		}
		else
		{
			?>
				<SCRIPT LANGUAGE="javascript">
				
				alert ("Verifique su cuenta y su contraseña");
				location.href = "index.php";
				</SCRIPT>
			<?php	
		}
	}
	else
	{
			?>
				<SCRIPT LANGUAGE="javascript">
				
				alert ("Verifique su cuenta y su contraseña");
				location.href = "index.php";
				</SCRIPT>
			<?php
	}
	mysql_free_result($result);
mysql_close();
?>
