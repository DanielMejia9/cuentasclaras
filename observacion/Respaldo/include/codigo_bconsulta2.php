<?php
require("conexion.php");
include("start.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css"/>
<title>Registro del Cliente</title>
</head>
<body>
<div id="linea2">
	<?php
			if (isset($_SESSION['k_username'])) 
						{
							echo '<img src="present.png" width="120" border="0" align="center" title="Sistema Automatizado Jireh Pro"/>';
							echo (' Usuario: '.$_SESSION['k_username']);
							echo '
								<table align="right">
									<tr>
										<td>&#124
											<a href="modulo.php">Pagina Principal</a>&#124
											
										</td>
										<td>
											<a href="logout.php">Salir</a>&#124
										</td>
								   </tr>
							   </table>';	
								}else{
										echo ' <form action="validar.php" name="" method="post" >
											<table align="right" border="0">
											<tr>
												<td>
													Usuario: <input type="text" name="usuario" size="15" maxlength="30"/>
													Contrase&ntildea: <input type="password"  name="password" size="15" maxlength="30"/>
													<input type="submit" value="Entrar" />
												</td>
											</tr>
											</table>
										 </form>';
										 echo '<img src="present.png" width="120" border="0" align="center" title="Sistema Automatizado Jireh Pro"/>';
										}
	   ?>


</div>
<?php
//almacenos en una variable el post de formulario
$buscar = $_POST["buscar"];
$rif = $_POST["rif_cliente"];
$cliente = $_POST["cliente"];
$sleccionar = mysql_query('SELECT * FROM registro_de_cliente WHERE nom_empresa = \''.$cliente.'\'');
$columna = mysql_fetch_array($sleccionar);
$comprobar = $rif == NULL| $cliente == NULL;


if (isset($_SESSION['k_username'])){
if(isset($buscar)){
	if ($comprobar)
	{
		?>
        <script language="javascript1.2">
		alert ("Campo Vacio");
		location.href = "buscar.php";
		</script>
        <?php
	}
	if ($columna["rif_empresa"] == $rif){
		$cod = $columna ["cod_clientes"];
		$empresa = $columna ["nom_empresa"];
		$rif = $columna ["rif_empresa"];
		$dir = $columna ["dir_empresa"];
		$cont = $columna ["cont_especial"];
		$fecha = $columna ["fecha"];
			if($calculo = mysql_query('SELECT * FROM calculo WHERE cod_cliente = \''.$cod.'\''))
			{
				if($columna2 = mysql_fetch_array($calculo))
					{
						$subtotal = $columna2["subtotal"];
						$iva = $columna2["iva"];
						$totalg = $columna2["totalgeneral"];
						$montor = $columna2["monto_retenido"];
						$montop = $columna2["monto_pagar"];
						}
				
			}
		//echo $columna ["fecha"];
		//echo $rif;
		echo '
				<form  method="post" action="imprimir_calculo.php">
				<table align="center" border="0" width="">
						<tr>
							<td align="left">Codigo:</td>
							<td><input type="text" name ="codigo" value="'.$cod.'"></td>
							<td align="left">Nombre del Cliente:</td>
							<td><input type="text" name="empresa" value="'.$empresa.'"></td>
							<td align="left">Direccion:</td>
							<td><input type="text" name="direccion" value="'.$dir.'"></td>
						</tr>
						<tr>
							<td align="left">RIF:</td>
							<td><input type="text"  name="rif" value="'.$rif.'"></td>
							<td align="left">Contribuyente:</td>
							<td><input type="text" name="cont" value="'.$cont.'"></td>
							<td align="left">Fecha:</td>
							<td><input type="text" value="'.$fecha.'"></td>
						</tr>
						
						
						<tr>
							<td align="left">Subtotal:</td>
							<td align="left">IVA:</td>
							<td align="left">Total General:</td>
							<td align="left">Monto Retenido:</td>
							<td align="left">Monto a Pagar:</td>
						</tr>
						
						<tr>
							<td><input type="text"  name="rif" value="'.$subtotal.'"></td>
							
							<td><input type="text" name="cont" value="'.$iva.'"></td>
							
							<td><input type="text" value="'.$totalg.'"></td>
							
							<td><input type="text" value="'.$montor.'"></td>
							
							<td><input type="text" value="'.$montop.'"></td>
						</tr>
						<tr>
							<td align="center" colspan="3"><input type="submit" value="Calcular" name="calcular"></td>
							<td align="center" colspan="3"><input type="reset" value="Limpiar"></td>
						</tr>
				</table> 
			</form>
		
		';
		}
	else
	{
		?>
        <script language="javascript1.2">
		alert ("Verifique el numero de RIF");
		location.href = "buscar.php";
		</script>
        <?php
	}
	
	
	}
	
}















?>