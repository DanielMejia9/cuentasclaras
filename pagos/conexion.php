<?php 
// Filtro tabla mysql con ajax php & mysql
// Demo Script

// Variables de conexion

$server = "localhost";
$user	= "root";
$pwd    = "webmastersixaguer";
$bd     = "cuentas_claras";

$con = mysql_connect($server, $user, $pwd) or die("Error de conexion!");
mysql_select_db($bd, $con);

/*
$server = "localhost";
$user	= "caracasw_user_cu";
$pwd    = "kRUp9^7*D{Ny";
$bd     = "caracasw_cuentas_claras";

$con = mysql_connect($server, $user, $pwd) or die("Error de conexion!");
mysql_select_db($bd, $con);
*/


//mysql_connect('localhost','root','webmastersixaguer')or die ('Ha fallado la conexión: '.mysql_error());
//mysql_select_db('filtro')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
?>