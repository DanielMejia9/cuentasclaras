<?php 

include("conexion.php");



//print_r($_POST);

if($_GET['action'] == 'listar')

{

	    // valores recibidos por POST

		if(isset($_POST['categoria']) && $_POST['categoria'] !='0')

		{

		$cate = $_POST["categoria"];

		$sql = "select a.id_trab,a.fkid_prio,b.desc_requ,a.trab_trab,a.proy_trab,a.tota_vef_trab,d.nomb_usuario from 

				tb_trabajos_actuales as a 

				inner join tb_requerimientos as b on a.fkid_requ =b.id_requ 

				inner join tb_asignacion_trabajos_actuales as c on c.fkid_trab = a.id_trab

				inner join tb_usuarios as d on d.id_usuario = c.fkid_usuario where b.id_requ ='".$cate."'";

		}

		else if(isset($_POST['usuario']) && $_POST['usuario'] !='0')

		{

		$vs = $_POST["usuario"];

		$sql = "select * from tb_pagos as A inner join tb_trabajos_actuales as B on A.fkid_trab = B.id_trab inner join tb_usuarios as C on A.fkid_usuario = C.id_usuario where C.id_usuario ='".$vs."'";

		}

		else

		{

		$sql = "select * from tb_pagos as A inner join tb_trabajos_actuales as B on A.fkid_trab = B.id_trab inner join tb_usuarios as C on A.fkid_usuario = C.id_usuario";

		}



	

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

			'fecha_desde'  	  => $row['fecha_desde'],

			'fecha_hasta'  	  => utf8_encode($row['fecha_hasta']),

			'trab_trab'  	  => utf8_encode($row['trab_trab']),

			'monto_depo'  	  => utf8_encode($row['monto_depo']),
			
			'nume_depo'  	  => utf8_encode($row['nume_depo']),

			'nomb_usuario'    => utf8_encode($row['nomb_usuario'])

		);

	}

	// convertimos el array de datos a formato json

	echo json_encode($datos);

}

?>

		