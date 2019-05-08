<?php
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();

$codi_trab = $_POST["cod_unitrab"];	
$modi = mysql_query("DELETE FROM tb_trabajos_actuales  WHERE id_trab ='".$codi_trab."'");
?>
	<script language="javascript">
    alert("Registro eliminado exitosamente");
    location.href = "../trabajos_actuales/trabajos_actuales.php";
    </script>
