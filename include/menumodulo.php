<div id="menu">
    <ul id="nav">
        <?php
        $rol = $_SESSION["rol"];
        if($rol == 1)
        {
        ?>
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
             <a href="pagos/pagos.php">Pagar</a>
        </li>
         
         <?php
        }
		if($rol == 2)
		{
		?>
        <li>
             <a href="trabajos_actuales/vtrabajos_actuales.php">Trabajos Actuales</a>
        </li>
        <li>
             <a href="ofertas/vofertas_actuales.php">Ofertas</a>
        </li>
		<li>
             <a href="pagos/mispagos.php">Mis Pagos</a>
        </li>
        <?php
		}
        ?>
        
        <li>
          <a href="logout.php">Salir</a>
       </li>
    </ul>
</div>