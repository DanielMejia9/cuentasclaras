<?php

require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$trabajo = new TrabajosActuales();



	//print_r($_POST);
	//print_r($_POST["codi_clie"]);
	$id_trab = $_POST["cod_unitrab"];
	$trabajo->editarTrabajos($id_trab,$_POST["prio"],$_POST["requ"],$_POST["proye"],$_POST["trab"],$_POST["form"],$_POST["moda"],$_POST["obse"],$_POST["cant"],$_POST["mont_vef"],$_POST["tota_vef"],$_POST["tiem"],$_POST["asigna_usuario"]);



?>