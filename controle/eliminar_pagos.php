<?php
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();

$codi_trab = $_POST["cod_unitrab"];	
$modi = mysql_query("DELETE FROM tb_pagos  WHERE nume_depo ='".$codi_trab."'");
?>
	<script language="javascript">
    alert("Registro eliminado exitosamente");
    location.href = "../pagos/reporte_pagos.php";
    </script>
