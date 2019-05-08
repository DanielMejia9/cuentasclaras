<?php

require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$pagos = new Pagos();



	//print_r($_POST);
	$pagos->editarPagos($_POST["desde"],$_POST["hasta"],$_POST["monto"],$_POST["numerodeposito"]);

?>