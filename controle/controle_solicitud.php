<?php

require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$oferta = new TrabajosActuales();


	
	if(isset($_POST["solicitar"]) and $_POST["solicitar"]=="si")
    {
        //print_r($_POST);
        //print_r($_POST["codi_clie"]);
		$sql="select * from tb_solicitudes where fkid_usuario = ".$_POST["usuario"]." and fkid_trab = ".$_POST["oferta"]."";
		$resultado = (mysql_query($sql));
		if(!(mysql_num_rows($resultado)>0))
		{
        $anadir = $oferta->anadirSolicitud($_POST["usuario"],$_POST["oferta"]);
		}
		else
		{
			echo "<script type='text/javascript'>
			alert('Ya realizo una solicitud a esta oferta');
			window.location='../ofertas/vofertas_actuales.php';
			</script>";
		}
   exit;
   }
		



?>