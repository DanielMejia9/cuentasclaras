<?php
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();

$cod_uniofer = $_POST["cod_uniofer"];	
$modi = mysql_query("DELETE FROM tb_trabajos_actuales  WHERE id_trab ='".$cod_uniofer."'");
?>
	<script language="javascript">
    alert("Registro eliminado exitosamente");
    location.href = "../ofertas/ofertas_actuales.php";
    </script>
