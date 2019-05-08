<?php

require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$oferta = new TrabajosActuales();



	//print_r($_POST);
	//print_r($_POST["codi_clie"]);
	$id_ofer = $_POST["cod_uniofer"];
	$oferta->editarOferta($id_ofer,$_POST["prio"],$_POST["requ"],$_POST["proye"],$_POST["trab"],$_POST["form"],$_POST["moda"],$_POST["obse"],$_POST["cant"],$_POST["mont_vef"],$_POST["tota_vef"],$_POST["tiem"]);

//Elimina Registro de las Tablas
$sql = "delete from tb_vizualizacion_oferta where fkid_trab ='$id_ofer'";
mysql_query($sql) or die (mysql_error());

$sql1 = "delete from tb_asignacion_trabajos_actuales where fkid_trab ='$id_ofer'";
mysql_query($sql1) or die (mysql_error());

 
$id = 0;
$res = mysql_query("select * from tb_vizualizacion_oferta order by id_visu DESC limit 1")or die(mysql_error());
while($reg = mysql_fetch_array($res))
{
	$id  = $reg['id_visu'];
}

if($id == 0)
{
	$id = 1;

}
else
{
	$id = $id + 1;	
}
	
	$checkbox = $_POST["queusuario"];	
	for($i=0; $i <sizeof($checkbox);$i++)
	{
		$sql = "insert into tb_vizualizacion_oferta values ($id,'".$checkbox[$i]."',$id_ofer)";
		mysql_query($sql) or die (mysql_error());
		echo $checkbox[$i];
	}
	
	
//Asignacion 

$id1 = 0;
$res1 = mysql_query("select * from tb_asignacion_trabajos_actuales order by id_asig DESC limit 1")or die(mysql_error());
while($reg1 = mysql_fetch_array($res1))
{
	$id1  = $reg1['id_asig'];
}

if($id1 == 0)
{
	$id1 = 1;
}
else
{
	$id1 = $id1 + 1;	
}
	
	$asigna_usuario = $_POST["asigna_usuario"];	
	for($j=0; $j <sizeof($asigna_usuario);$j++)
	{
		$sql1 = "insert into tb_asignacion_trabajos_actuales values ($id1,'".$asigna_usuario[$j]."',$id_ofer)";
		mysql_query($sql1) or die (mysql_error());
		echo $asigna_usuario[$j];
	}
	
	
	
	
	
	

?>