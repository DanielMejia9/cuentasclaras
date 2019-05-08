<?php

require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$oferta = new TrabajosActuales();



	//print_r($_POST);
	//print_r($_POST["codi_clie"]);
	$id_ofer = $_POST["cod_uniofer"];
	$oferta->editarOferta($id_ofer,$_POST["prio"],$_POST["requ"],$_POST["proye"],$_POST["trab"],$_POST["form"],$_POST["moda"],$_POST["obse"],$_POST["cant"],$_POST["mont_vef"],$_POST["tota_vef"],$_POST["tiem"],$_POST["asigna_usuario"]);



?>