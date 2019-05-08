<?php

require_once("class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$trabajo = new TrabajosActuales();

$id    = $_GET["codi_trab"];
$tabla = "tb_trabajos_actuales";
$cmls = $trabajo->usuarioCombo($id);
									 
for($g=0;$g<sizeof($cmls);$g++)
{
//echo "<option value=".$cmls[$g]['id_usuario'].">".$cmls[$g]['nomb_usuario']." ".$cmls[$g]['apel_usuario']."</option>";
echo $cmls[$g]['id_usuario'].$cmls[$g]['obse_trab'].$cmls[$g]['obse_trab'];
}
											
?>