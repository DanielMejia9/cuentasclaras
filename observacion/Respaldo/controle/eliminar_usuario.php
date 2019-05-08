<?php
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();

$cod_uniusua = $_POST["cod_uniusua"];	
$modi = mysql_query("DELETE FROM tb_usuarios  WHERE id_usuario ='".$cod_uniusua."'");
?>
	<script language="javascript">
    alert("Registro eliminado exitosamente");
    location.href = "../usuarios/usuarios.php";
    </script>
