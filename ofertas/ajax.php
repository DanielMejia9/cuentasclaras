<?php 
include("conexion.php");

//print_r($_POST);
if($_GET['action'] == 'listar')
{
	    // valores recibidos por POST
		if(isset($_POST['categoria']) && $_POST['categoria'] !='0')
		{
		$cate = $_POST["categoria"];
		$sql = "select  a.id_trab,a.fkid_prio,d.desc_requ,a.trab_trab,a.proy_trab,a.tota_vef_trab,c.nomb_usuario,c.id_usuario from tb_trabajos_actuales as a 
				left join tb_solicitudes as b on a.id_trab = b.fkid_trab 
				left join tb_usuarios as c on c.id_usuario = b.fkid_usuario 
				left join tb_requerimientos as d on d.id_requ = a.fkid_requ
				where id_trab not in (select fkid_trab from tb_asignacion_trabajos_actuales) and d.id_requ ='".$cate."'";
		}
		else if(isset($_POST['usuario']) && $_POST['usuario'] !='0')
		{
		$vs = $_POST["usuario"];
		$sql = "select  a.id_trab,a.fkid_prio,d.desc_requ,a.trab_trab,a.proy_trab,a.tota_vef_trab,c.nomb_usuario,c.id_usuario from tb_trabajos_actuales as a 
				left join tb_solicitudes as b on a.id_trab = b.fkid_trab 
				left join tb_usuarios as c on c.id_usuario = b.fkid_usuario 
				left join tb_requerimientos as d on d.id_requ = a.fkid_requ
				where id_trab not in (select fkid_trab from tb_asignacion_trabajos_actuales) and c.id_usuario ='".$vs."'";
		}
		else
		{
		$sql = "select  a.id_trab,a.fkid_prio,d.desc_requ,a.trab_trab,a.proy_trab,a.tota_vef_trab,c.nomb_usuario,c.id_usuario from tb_trabajos_actuales as a 
				left join tb_solicitudes as b on a.id_trab = b.fkid_trab 
				left join tb_usuarios as c on c.id_usuario = b.fkid_usuario 
				left join tb_requerimientos as d on d.id_requ = a.fkid_requ
				where id_trab not in (select fkid_trab from tb_asignacion_trabajos_actuales)";}

	
	// Ordenar por
	/*$vorder = 0;//$_POST['orderby'];
	
	if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}*/	
	$query = mysql_query($sql,$con);
	$datos = array();
	
	/*echo '<pre>';
	print_r($query);
	echo '</pre>';
	echo '<pre>';
	print_r($sql);
	echo '</pre>';*/
	
	while($row = mysql_fetch_array($query))
	{
		$datos[] = array(
			'id_trab'     	  => $row['id_trab'],
			'fkid_prio'  	  => $row['fkid_prio'],
			'desc_requ'  	  => utf8_encode($row['desc_requ']),
			'trab_trab'  	  => utf8_encode($row['trab_trab']),
			'proy_trab'  	  => utf8_encode($row['proy_trab']),
			'tota_vef_trab'   => utf8_encode($row['tota_vef_trab']." Bsf"),
			'nomb_usuario'    => utf8_encode($row['nomb_usuario']),
			'id_usuario'  	  => utf8_encode($row['id_usuario'])
		);
	}
	// convertimos el array de datos a formato json
	echo json_encode($datos);
}
?>
		