<?php

class Conectar
{
	public static function conecta()
	{
		//Hacemos la conexion a la BD e ingresamos el nombre de servidor
		//el usuario  y su clave
		$con = mysql_connect("localhost","root","webmastersixaguer");
		//Le deciamos que tipo de cotejamiento será utilizado
		mysql_query("SET NAMES 'utf8'");
		//nos conectamos a la BD
		mysql_select_db('cuentas_claras');
		
		
		
		/*//Hacemos la conexion a la BD e ingresamos el nombre de servidor
		//el usuario  y su clave
		$con = mysql_connect("50.62.209.111:3306","user_cuentas","#Cvlq264");
		//Le deciamos que tipo de cotejamiento será utilizado
		mysql_query("SET NAMES 'utf8'");
		//nos conectamos a la BD
		mysql_select_db('cuentas_claras');*/
		
		/*//Hacemos la conexion a la BD e ingresamos el nombre de servidor
		//el usuario  y su clave
		$con = mysql_connect("localhost","caracasw_user_cu","kRUp9^7*D{Ny");
		//Le deciamos que tipo de cotejamiento será utilizado
		mysql_query("SET NAMES 'utf8'");
		//nos conectamos a la BD
		mysql_select_db('caracasw_cuentas_claras');*/
		
		return $con;
				
		}
	
	}
	


class TrabajosActuales
{
	
	private $datos, $datos2,$datos3,$usuarios, $requ, $requ2, $prio1, $prio2, $suma;
	
	public function __construct()
	{
		$this->datos=array();
	}
	/*Muestra todo los trabajos*/	
	public function listarTrabajos()
	{
		$sql = "select * from tb_trabajos_actuales as A inner join tb_trabajos_asignados as B on A.id_trab = B.id_trab";
		$res = mysql_query($sql,Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
		}
		return $this->datos;
	}
	
	/*Muestra todo los trabajos del usuario*/	
	public function listarTrabajosUsuario($usuario)
	{
		$sql = "select * from tb_trabajos_actuales As A inner join tb_usuarios As B on A.id_usuario = B.id_usuario where B.id_rol = 2 and A.id_usuario = $usuario";
		$res = mysql_query($sql,Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
		}
		return $this->datos;
	}
	
	
	/*Paginado Utilizado primeramente para los CLiente*/
	public function paginadoTrabajos($inicio)
	{
		//$sql = "select * from tb_trabajos_actuales order by id_trab desc limit $inicio, 10";
		$sql = "select * from tb_trabajos_actuales as A inner join tb_trabajos_asignados as B on A.id_trab = B.id_trab order by A.id_trab desc limit $inicio, 10";
		$res = mysql_query($sql, Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
		}
		return $this->datos;
	}
		
	/*Paginado por usuario*/
	public function paginadoTrabajosUsuario($inicio,$usuario)
	{
		//$sql = "select * from tb_trabajos_actuales order by id_trab desc limit $inicio, 10";
		$sql = "select * from tb_trabajos_actuales As A inner join tb_usuarios As B on A.id_usuario = B.id_usuario where B.id_rol = 2 and A.id_usuario = $usuario order by id_trab desc limit $inicio, 10";
		$res = mysql_query($sql, Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
		}
		return $this->datos;
	}
	
	public function anadirTrabajo($prio,$req,$proye,$trab,$form,$moda,$obse,$cant,$mont_vef,$tota_vef,$tiem,$asig)
	{
		
		$sql="insert into tb_trabajos_actuales values (null,'$prio','$req','$proye','$trab','$form','$moda','$obse','$cant','$mont_vef','$tota_vef','$tiem','$asig',2)";
		
		
		
		//en este caso  como el codi_clie de la BD es PRIMARY
		$reg = mysql_query($sql, Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='ofertas_actuales.php';
			</script>";
		
		
		}
		
		public function editarTrabajos($id,$prio,$requ,$proye,$trab,$form,$moda,$obse,$cant,$mont_vef,$tota_vef,$tiem,$asig)
	{
		//echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
	$sql= "update tb_trabajos_actuales set fkid_prio ='$prio',	fkid_requ = '$requ', proy_trab = '$proye', trab_trab = '$trab', form_trab = '$form', moda_trab = '$moda', obse_trab = '$obse', cant_trab = '$cant', mont_bsf_trab = '$mont_vef', tota_vef_trab = '$tota_vef', tiem_esti_trab = '$tiem', id_usuario = '$asig' where id_trab = '$id'";
		
		$reg = mysql_query($sql,Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido modificado satisfactoriamente');
			window.location='../trabajos_actuales/trabajos_actuales.php';
			</script>";
		
		}
		
	public function listarTrabajo($codiTrab)
	{
		
		$sql = "select * from tb_trabajos_actuales where id_trab = $codiTrab";
		$res = mysql_query($sql,Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
			
			}
			return $this->datos;
		}
	
		public function llenarComboTrab($id)
		{
			$sql = "select * from tb_trabajos_actuales where prio_trab = '$id'";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos[] = $reg;
				}
			return $this->datos;

			}
	



/************* Ofertas*********************/
	//Pagina de Ofertas
	public function paginadoOfertas($inicio)
	{
		//$sql = "select * from tb_oferta_trabajo order by id_ofer desc limit $inicio, 10";
		$sql = "select * from tb_trabajos_actuales where fkid_status = '0' order by id_trab desc limit $inicio, 10";
		$res = mysql_query($sql, Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
			
			}
			return $this->datos;
		}
		
		//Listar de Ofertas
		public function listarOfertas()
		{
			//$sql = "select * from tb_oferta_trabajo";
			$sql = "select * from tb_trabajos_actuales where fkid_status = '0'";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos[] = $reg;
				}
			return $this->datos;
			}
			
			
			//Listar de Ofertas
		public function listarOfertasMod($codiOferta)
		{
			//$sql = "select * from tb_oferta_trabajo where id_ofer = $codiOferta";
			$sql = "select * from tb_trabajos_actuales where id_trab = $codiOferta";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos[] = $reg;
				}
			return $this->datos;
			}
			
			
		
		/*public function anadirOferta($prio,$req1,$req2,$proye,$trab,$form,$moda,$obse,$link,$cant,$mont_vef,$tota_vef,$tiem,$usuario)
	{
		
		//$sql="insert into tb_oferta_trabajo values (null,'$prio','$req1','$req2','$proye','$trab','$form','$moda','$obse','$link','$cant','$mont_vef','$tota_vef','$tiem','$usuario')";
		$sql="insert into tb_trabajos_actuales values (null,'$prio','$req1','$req2','$proye','$trab','$form','$moda','$obse','$cant','$mont_vef','$tota_vef','$tiem','$usuario',2)";
		//en este caso  como el codi_clie de la BD es PRIMARY
		$reg = mysql_query($sql, Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='ofertas_actuales.php';
			</script>";
		
		
		}*/
		
		public function editarOferta($id,$prio,$req,$proye,$trab,$form,$moda,$obse,$cant,$mont_vef,$tota_vef,$tiem,$usuario)
	{
		//echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
	//$sql= "update tb_oferta_trabajo set fkid_prio ='$prio',	fkid_requ = '$req', proy_ofer = '$proye', trab_ofer = '$trab', form_ofer = '$form', moda_ofer = '$moda', obse_ofer = '$obse', cant_ofer = '$cant', mont_bsf_ofer = '$mont_vef', tota_vef_ofer = '$tota_vef', tiem_esti_ofer = '$tiem', id_usuario = '$usuario' where id_ofer = '$id'";
	$sql= "update tb_trabajos_actuales set fkid_prio ='$prio',	fkid_requ = '$req', proy_trab = '$proye', trab_trab = '$trab', form_trab = '$form', moda_trab = '$moda', obse_trab = '$obse', cant_trab = '$cant', mont_bsf_trab = '$mont_vef', tota_vef_trab = '$tota_vef', tiem_esti_trab = '$tiem', id_usuario = '$usuario' where id_trab = '$id'";
		
		$reg = mysql_query($sql,Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido modificado satisfactoriamente');
			window.location='../ofertas/ofertas_actuales.php';
			</script>";
		
		
		}
		
		//Listar Combo
		
		public function llenarComboOfer($id)
		{
			$sql = "select * from tb_oferta_trabajo where prio_ofer = '$id'";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos[] = $reg;
				}
			return $this->datos;

			}
			
			
			//Rellenar Combo Modalidad de Pago y Forma de Pago
		public function libCombo($id,$tabla,$campoid)
		{
			$sql = "select * from $tabla where $campoid = '$id'";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos3[] = $reg;
			}
			return $this->datos3;
		}
				
		//Rellenar Combo Modalidad de Pago y Forma de Pago
		public function libCombo2($id,$tabla,$campoid)
		{	
			$sql = "select * from $tabla where $campoid = '$id'";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos2[] = $reg;
			}
			return $this->datos2;
		}
				
			
						


/*************************************************/
/********************USUARIOS*********************/
/*************************************************/	


	
	//Paginado Utilizado primeramente para los CLiente
	public function paginadoUsuarios($inicio)
	{
		$sql = "select * from tb_usuarios order by id_usuario asc limit $inicio, 10";
		$res = mysql_query($sql, Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
			
			}
			return $this->datos;
		}
	
	public function anadirUsuarios($nomb,$apel,$cedu,$corr,$tele,$tele_opci,$password,$rol)
	{
		
		$sql="insert into tb_usuarios values (null,'$nomb','$apel','$cedu','$corr','$tele','$tele_opci','$password','$rol')";
		//en este caso  como el codi_clie de la BD es PRIMARY
		$reg = mysql_query($sql, Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='usuarios.php';
			</script>";
		
		
		}
		
		public function editarUsuarios($id,$nomb,$apel,$cedu,$corr,$tele,$tele_opci,$password,$rol)
	{
		
		
		//echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
	$sql= "update tb_usuarios set nomb_usuario = '$nomb', apel_usuario ='$apel',cedu_usuario = '$cedu',
	corr_usuario = '$corr', tele_usuario = '$tele', tele_opci_usuario = '$tele_opci', pass_usuario ='$password',
	id_rol = '$rol' where id_usuario = '$id'";
		
		$reg = mysql_query($sql,Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido modificado satisfactoriamente');
			window.location='../usuarios/usuarios.php';
			</script>";
		
		}	
		
		
		//Editar Usuarios pero sin modificar la clave
		public function editarUsuariosSinPass($id,$nomb,$apel,$cedu,$corr,$tele,$tele_opci,$rol)
	{
		
		
		//echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
	$sql= "update tb_usuarios set nomb_usuario = '$nomb', apel_usuario ='$apel',cedu_usuario = '$cedu',
	corr_usuario = '$corr', tele_usuario = '$tele', tele_opci_usuario = '$tele_opci',
	id_rol = '$rol' where id_usuario = '$id'";
		
		$reg = mysql_query($sql,Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido modificado satisfactoriamente');
			window.location='../usuarios/usuarios.php';
			</script>";
		
		}	
		
		
		//Listar de Ofertas
		public function listarUsuarios()
		{
			$sql = "select * from tb_usuarios ";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos2[] = $reg;
				}
			return $this->datos2;
			}	
			
			//Roles
			public function listarRoles()
			{
				$sql = "select * from tb_roles";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->datos[] = $reg;
					}
				return $this->datos;
				
				}
				
		/*Lista usuarios a modificar*/		
		public function listarUsuariosMod($codiOferta)
		{
			$sql = "select * from tb_usuarios where id_usuario = $codiOferta";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos[] = $reg;
			}
			return $this->datos;
		}		
				
				
		/*COMBOS DE USUARIOS*/
		public function usuarioComboUsuarios($rol)
		{
			$sql = "select * from tb_roles where id_rol = $rol";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->usuarios[] = $reg;
			}
			return $this->usuarios;
		}
					
		public function listarComboUsuarios($rol)
		{
			$sql = "select * from tb_roles where id_rol != $rol";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->usuarios[] = $reg;
			}
			return $this->usuarios;
		}
		
		
		
		/*COMBOS DE REQUERIMIENTOS*/
		public function comboRequemiento()
		{
			$sql = "select * from tb_requerimientos";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->requ2[] = $reg;
			}
			return $this->requ2;
		}
		
		public function comboRequemiento2($requerimiento)
		{
			$sql = "select * from tb_requerimientos where id_requ = $requerimiento";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->requ[] = $reg;
			}
			return $this->requ;
		}
		
		
		public function listarRequemiento($requerimiento)
		{
			$sql = "select * from tb_requerimientos where id_requ != $requerimiento";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->requ[] = $reg;
			}
			return $this->requ;
		}
		
		
		/*COMBO DE USUARIOS SELECCION*/
			public function comboUsuario()
			{
				$sql = "select * from tb_usuarios";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->datos[] = $reg;
					}
					return $this->datos;
				}
				
			public function usuarioCombo($usuario)
			{
				$sql = "select * from tb_usuarios where id_usuario = $usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->usuarios[] = $reg;
				}
				return $this->usuarios;
			}
					
			public function listarCombo($usuario)
			{
				$sql = "select * from tb_usuarios where id_usuario != $usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->usuarios[] = $reg;
				}
				return $this->usuarios;
			}
		
		/*COMBO DE PRIORIDAD SELECCION*/
			public function comboPrioridad()
			{
				$sql = "select * from tb_prioridad";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->prio1[] = $reg;
					}
					return $this->prio1;
				}
				
			public function prioridadCombo($prioridad)
			{
				$sql = "select * from tb_prioridad where id_prio = $prioridad";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->prio2[] = $reg;
				}
				return $this->prio2;
			}
					
			public function listarComboPrioridad($prioridad)
			{
				$sql = "select * from tb_prioridad where id_prio != $prioridad";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->prio2[] = $reg;
				}
				return $this->prio2;
			}
			
			//Suma de Monto
			public function sumarCampo($id_usuario)
			{
				$sql = "select SUM(mont_bsf_trab),SUM(tota_vef_trab)  from tb_trabajos_actuales where id_usuario = $id_usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->suma[] = $reg;
				}
				return $this->suma;

			}

							
	}

