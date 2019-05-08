<?php
include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $pago = new Pagos();
	  
	  $id_category = $_POST['id_category'];
	  $subcategoria = $pago->trabajoPorUsuario($id_category);
	  echo "<option>Seleccione</option>";
	  for($i=0;$i<sizeof($subcategoria);$i++)
	  {	
	  	 
		  echo "<option value=".$subcategoria[$i]['fkid_trab'].">Codigo:".$subcategoria[$i]['fkid_trab']." - "."Detalle Trabajo: ".$subcategoria[$i]['desc_requ']." - "." Monto: ".number_format($subcategoria[$i]['tota_vef_trab'], 2, ',', '.')."</option>";
	  }

echo $html;
?>