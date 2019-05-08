<?php

require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$usuarios = new TrabajosActuales();



	//print_r($_POST);
	//print_r($_POST["codi_clie"]);
	$id_usuario = $_POST["cod_uniusua"];
	if ($_POST["pass"] !="")
	{
	$password = md5($_POST["pass"]);
	$usuarios->editarUsuarios($id_usuario,$_POST["nomb"],$_POST["apel"],$_POST["cedu"],$_POST["corr"],$_POST["tele"],$_POST["teleopci"],$password,$_POST["asignar_rol"]);
	}
	else
	{
		$usuarios->editarUsuariosSinPass($id_usuario,$_POST["nomb"],$_POST["apel"],$_POST["cedu"],$_POST["corr"],$_POST["tele"],$_POST["teleopci"],$_POST["asignar_rol"]);
		}


?>