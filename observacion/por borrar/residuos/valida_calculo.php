<?php
require("conexion.php");
$ccliente = $_POST["codigo_cliente"];
$calcular = $_POST["calcular"];
//Guardar las seleccion en variables para mostrarlas en el formulario
// LAs variables estan con una M en principio porque la M de MOSTRAR
$result= mysql_query('SELECT cod_clientes, nom_empresa, rif_empresa, dir_empresa, cont_especial FROM registro_de_cliente');
$row = mysql_fetch_array($result);
// Al presionar el boton de calcular verificará si el input es vacio
// si lo es entonces saldra el mns de lo contrario comprobara si el numero coincide en la BD
if (isset($calcular))
{
	if($ccliente == null)
	{
		?>
		<SCRIPT LANGUAGE="javascript">
				alert("Debes ingresar el codigo del cliente");
				location.href = "calculo.php";
				
		</SCRIPT>
		<?
		}
		else
		{
			if($row["cod_clientes"] == $ccliente)
				{
					//echo "exito". $row["nom_empresa"];
					$row['nom_empresa'];
					$_row['dir_empresa'];
					$_row['rif_empresa'];
					$_row['cont_especial'];
					?>
					<SCRIPT LANGUAGE="javascript">
						alert("Debes ingresar el codigo del cliente");
						location.href = "calculo.php";				
						</SCRIPT>
					<?
					}
					else
						{
							?>
								<SCRIPT LANGUAGE="javascript">
                                        alert("Codigo de cliente errado");
                                        location.href = "calculo.php";
                                        
                                </SCRIPT>
                                <?
							}
					
			}


}
?>