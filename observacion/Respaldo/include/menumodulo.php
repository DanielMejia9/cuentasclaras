<?php
/*echo ('
<div id="menu"'); echo $style;  echo('>
<ul id="nav">
	<li>
		 <a href="trabajos_actuales/trabajos_actuales.php">Trabajos Actuales</a>
	</li>
	<li>
		 <a href="ofertas/ofertas_actuales.php">Ofertas</a>
	</li>
	<li>
		 <a href="usuarios/usuarios.php">Usuarios</a>
	</li>
    <li>
      <a href="../logout.php">Salir</a>
   </li>
</ul>
 
</div>');
*/
?>


<div id="menu">
<ul id="nav">
	<li>
		 <a href="trabajos_actuales/trabajos_actuales.php">Trabajos Actuales</a>
	</li>
	<li>
		 <a href="ofertas/ofertas_actuales.php">Ofertas</a>
	</li>
    <?php
    $rol = $_SESSION["rol"];
	if($rol == 1)
	{
	?>
     <li>
		 <a href="usuarios/usuarios.php">Usuarios</a>
	</li>
     <?php
	}
	?>
	
    <li>
      <a href="logout.php">Salir</a>
   </li>
</ul>
 
</div>