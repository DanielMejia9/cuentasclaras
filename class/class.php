<?php

class Conectar
{
	public static function conecta()
	{
		//Hacemos la conexion a la BD e ingresamos el nombre de servidor
		//el usuario  y su clave
		$con = mysql_connect("localhost","root","");
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
	
	private $datos,$datos2,$datos3,$datos4, $usuarios, $requ, $requ2, $prio1, $prio2, $suma,$asigna,$asigna1,$asigna2,$restapago;
	
	public function __construct()
	{
		$this->datos=array();
	}
	/*Muestra todo los trabajos*/
	public function listarTrabajos()
	{
		//$sql = "select * from tb_trabajos_actuales where id_usuario <> 0";
		$sql = "select * from tb_trabajos_actuales where id_trab in(select fkid_trab from tb_asignacion_trabajos_actuales) order by id_trab desc";
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
		//$sql = "select * from tb_trabajos_actuales As A inner join tb_usuarios As B on A.id_usuario = B.id_usuario where B.id_rol = 2 and A.id_usuario = $usuario";
		$sql = "select * from tb_asignacion_trabajos_actuales as A inner join tb_trabajos_actuales as B on A.fkid_trab = B.id_trab where A.fkid_usuario = $usuario ";
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
		//$sql = "select * from tb_trabajos_actuales where id_usuario <> 0 order by id_trab desc limit $inicio, 10";
		$sql = "select * from tb_trabajos_actuales where id_trab in(select fkid_trab from tb_asignacion_trabajos_actuales) order by id_trab desc limit $inicio, 10";
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
		//$sql = "select * from tb_trabajos_actuales As A inner join tb_usuarios As B on A.id_usuario = B.id_usuario where B.id_rol = 2 and A.id_usuario = $usuario order by id_trab desc limit $inicio, 10";
		$sql = "select * from tb_asignacion_trabajos_actuales as A inner join tb_trabajos_actuales as B on A.fkid_trab = B.id_trab where A.fkid_usuario = $usuario order by id_trab desc limit $inicio, 10";
		$res = mysql_query($sql, Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
		}
		return $this->datos;
	}
	
	public function anadirTrabajo($prio,$req,$proye,$trab,$form,$moda,$obse,$cant,$mont_vef,$tota_vef,$tiem)
	{
		
		$sql="insert into tb_trabajos_actuales values (null,'$prio','$req','$proye','$trab','$form','$moda','$obse','$cant','$mont_vef','$tota_vef','$tiem',0)";
		//en este caso  como el codi_clie de la BD es PRIMARY
		$reg = mysql_query($sql, Conectar::conecta());
		
		$id_trab = mysql_insert_id(); 
		echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='../ofertas/modificar_ofertas.php?codi_trab=$id_trab';
			</script>";
		}
	
	public function anadirTrabajo2($prio,$req,$proye,$trab,$form,$moda,$obse,$cant,$mont_vef,$tota_vef,$tiem)
	{
		
		$sql="insert into tb_trabajos_actuales values (null,'$prio','$req','$proye','$trab','$form','$moda','$obse','$cant','$mont_vef','$tota_vef','$tiem',0)";
		//en este caso  como el codi_clie de la BD es PRIMARY
		$reg = mysql_query($sql, Conectar::conecta());
		
		
		$id_trab = mysql_insert_id();
		echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='../trabajos_actuales/modificar_trabajos.php?codi_trab=$id_trab';
			</script>";
		}
		
		public function editarTrabajos ($id,$prio,$requ,$proye,$trab,$form,$moda,$obse,$cant,$mont_vef,$tota_vef,$tiem)
	{
		//echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
	$sql= "update tb_trabajos_actuales set fkid_prio ='$prio',	fkid_requ = '$requ', proy_trab = '$proye', trab_trab = '$trab', form_trab = '$form', moda_trab = '$moda', obse_trab = '$obse', cant_trab = '$cant', mont_bsf_trab = '$mont_vef', tota_vef_trab = '$tota_vef', tiem_esti_trab = '$tiem' where id_trab = '$id'";
		
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
		//$sql = "select * from tb_trabajos_actuales where id_usuario = 0 order by id_trab desc limit $inicio, 10";
		$sql = "select * from tb_trabajos_actuales where id_trab not in(select fkid_trab from tb_asignacion_trabajos_actuales) order by id_trab desc limit $inicio, 10";
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
			//$sql = "select * from tb_trabajos_actuales where id_usuario = 0";
			$sql = "select * from tb_trabajos_actuales where id_trab not in(select fkid_trab from tb_asignacion_trabajos_actuales)";
			$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->datos[] = $reg;
				}
			return $this->datos;
			}
			
            
        //Filtro para los usuarios
        public function paginadoOfertasUsu($inicio,$usuario)
        {
        //$sql = "select * from tb_trabajos_actuales as A inner join tb_vizualizacion_oferta as B on A.id_trab = B.fkid_trab where B.fkid_usuario = $usuario and A.id_usuario = '0' order by id_trab desc limit $inicio, 10";
        //$sql = "select * from tb_trabajos_actuales where id_usuario = 0 order by id_trab desc limit $inicio, 10";
         $sql = "select * from tb_trabajos_actuales as A inner join tb_vizualizacion_oferta as B on A.id_trab = B.fkid_trab where fkid_usuario = $usuario  order by id_trab desc limit $inicio, 10";
		
		$res = mysql_query($sql, Conectar::conecta());
        while($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
            
            }
            return $this->datos;
        }
        
        //Listar de Ofertas
        public function listarOfertasUsu($usuario)
        {
            //$sql = "select * from tb_oferta_trabajo";
            //$sql = "select * from tb_trabajos_actuales as A inner join tb_vizualizacion_oferta as B on A.id_trab = B.fkid_trab where B.fkid_usuario = $usuario and  A.id_usuario = '0'";
            $sql = "select * from tb_trabajos_actuales as A inner join tb_vizualizacion_oferta as B on A.id_trab = B.fkid_trab where fkid_usuario = $usuario";
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
			
			
		
		public function anadirOferta($prio,$req1,$req2,$proye,$trab,$form,$moda,$obse,$link,$cant,$mont_vef,$tota_vef,$tiem)
	{
		
		$sql="insert into tb_oferta_trabajo values (null,'$prio','$req1','$req2','$proye','$trab','$form','$moda','$obse','$link','$cant','$mont_vef','$tota_vef','$tiem')";
		//en este caso  como el codi_clie de la BD es PRIMARY
		$reg = mysql_query($sql, Conectar::conecta());
		
		$id_trab = mysql_insert_id(); 
		echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='../ofertas/modificar_ofertas.php?codi_trab=$id_trab';
			</script>";
		
		
		}
		
		public function editarOferta($id,$prio,$req,$proye,$trab,$form,$moda,$obse,$cant,$mont_vef,$tota_vef,$tiem)
	{
		//echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
	//$sql= "update tb_oferta_trabajo set fkid_prio ='$prio',	fkid_requ = '$req', proy_ofer = '$proye', trab_ofer = '$trab', form_ofer = '$form', moda_ofer = '$moda', obse_ofer = '$obse', cant_ofer = '$cant', mont_bsf_ofer = '$mont_vef', tota_vef_ofer = '$tota_vef', tiem_esti_ofer = '$tiem', id_usuario = '$usuario' where id_ofer = '$id'";
	$sql= "update tb_trabajos_actuales set fkid_prio ='$prio',	fkid_requ = '$req', proy_trab = '$proye', trab_trab = '$trab', form_trab = '$form', moda_trab = '$moda', obse_trab = '$obse', cant_trab = '$cant', mont_bsf_trab = '$mont_vef', tota_vef_trab = '$tota_vef', tiem_esti_trab = '$tiem' where id_trab = '$id'";
		
		$reg = mysql_query($sql,Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido modificado satisfactoriamente');
			window.location='../ofertas/modificar_ofertas.php?codi_trab=$id';
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
					$this->datos2[] = $reg;
					}
					return $this->datos2;
				
				}
				
				//Rellenar Combo Modalidad de Pago y Forma de Pago
			public function libCombo2($id,$tabla,$campoid)
			{
				
				$sql = "select * from $tabla where $campoid = '$id'";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->datos3[] = $reg;
					}
					return $this->datos3;
				
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
				$this->datos[] = $reg;
				}
			return $this->datos;
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
				$sql = "select SUM(mont_bsf_trab),SUM(tota_vef_trab)  from tb_trabajos_actuales as A inner join tb_asignacion_trabajos_actuales as B on A.id_trab = B.fkid_trab where fkid_usuario = $id_usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->suma[] = $reg;
				}
				return $this->suma;

			}
			
			//pago
			public function deducirPago($id_usuario)
			{
				$sql = " select SUM(monto_depo) from tb_pagos where fkid_usuario = $id_usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->restapago[] = $reg;
				}
				return $this->restapago;

			}
			
			//Suma de Monto
			public function checkboxUsuarios($usuario)
			{
				//$sql = "select * from tb_usuarios as A left join tb_vizualizacion_oferta as B on A.id_usuario = B.fkid_usuario";
				$sql = "select * from tb_usuarios where id_usuario <> $usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->datos3[] = $reg;
				}
				return $this->datos3;
			}
			
			public function checkbox($id_trab,$usuario)
			{
				//$sql = "select * from tb_usuarios as A left join tb_vizualizacion_oferta as B on A.id_usuario = B.fkid_usuario";
				//$sql = "select * from tb_vizualizacion_oferta where fkid_trab = $id_trab";
				$sql = "select * from tb_usuarios as A inner join tb_vizualizacion_oferta as B on A.id_usuario = B.fkid_usuario where B.fkid_trab = $id_trab and B.fkid_usuario <> $usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->datos2[] = $reg;
				}
				return $this->datos2;
			}
			
			public function selectCheckbok($id_trab,$usuario)
			{
				$sql = "select distinct id_usuario,nomb_usuario from tb_usuarios where id_usuario not in (select fkid_usuario from tb_vizualizacion_oferta where fkid_trab =  $id_trab) and id_usuario <> $usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->datos4[] = $reg;
				}
				return $this->datos4;
			}
			
			public function anadirSolicitud($usuario,$oferta)
			{
			$sql="insert into tb_solicitudes values (null,'$usuario','$oferta')";
			$reg = mysql_query($sql, Conectar::conecta());
			echo "<script type='text/javascript'>
			alert('Hemos recibido su solicitud');
			window.location='../ofertas/vofertas_actuales.php';
			</script>";
			}
			
			public function solicitudDelUsuario($id_trab)
			{
				$sql = "select C.nomb_usuario from tb_trabajos_actuales as A inner join tb_solicitudes as B on A.id_trab = B.fkid_trab inner join tb_usuarios as C on C.id_usuario = B.fkid_usuario  where A.id_trab = $id_trab";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->usuarios[] = $reg;
				}
				return $this->usuarios;				
			}
			
			
			//ASIGNACION DE USUARIO CON CHECKBOX
			
			
			//Suma de Monto
			public function checkboxUsuariosAsig($usuario)
			{
				//$sql = "select * from tb_usuarios as A left join tb_vizualizacion_oferta as B on A.id_usuario = B.fkid_usuario";
				$sql = "select * from tb_usuarios where id_usuario <> $usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->asigna[] = $reg;
				}
				return $this->asigna;
			}
			
			public function checkboxAsig($id_trab,$usuario)
			{
				//$sql = "select * from tb_usuarios as A left join tb_vizualizacion_oferta as B on A.id_usuario = B.fkid_usuario";
				//$sql = "select * from tb_vizualizacion_oferta where fkid_trab = $id_trab";
				$sql = "select * from tb_usuarios as A inner join tb_asignacion_trabajos_actuales as B on A.id_usuario = B.fkid_usuario where B.fkid_trab = $id_trab and B.fkid_usuario <>$usuario ";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->asigna1[] = $reg;
				}
				return $this->asigna1;
			}
			
			public function selectCheckbokAsig($id_trab,$usuario)
			{
				$sql = "select distinct id_usuario,nomb_usuario from tb_usuarios where id_usuario not in (select fkid_usuario from tb_asignacion_trabajos_actuales where fkid_trab = $id_trab)and id_usuario <> $usuario";
				$res = mysql_query($sql,Conectar::conecta());
				while($reg = mysql_fetch_assoc($res))
				{
					$this->asigna2[] = $reg;
				}
				return $this->asigna2;
			}

	}

class Pagos
{
	
	private $pagos,$pagos1,$datos;
	
	public function __construct()
	{
		$this->pagos=array();
	}
	
	//Seleccion de los usuarios
	public function usuarios()
	{
	 $sql="select * from tb_usuarios";
	 	$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->pagos[] = $reg;
			}
			return $this->pagos;
	}
/*	public function usuariosSel($usuario)
	{
	 $sql="select * from tb_usuarios where id_usuario =$usuario";
	 	$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->pagos[] = $reg;
			}
			return $this->pagos;
	}
	public function usuariosSelResto($id_usuario)
	{
	 $sql="select * from tb_usuarios where id_usuario <> $id_usuario";
	 	$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->pagos[] = $reg;
			}
			return $this->pagos;
	}*/
	
	
	//Seleccion de los trabajos relacionado al usuario
	public function trabajoPorUsuario($id_usuario)
	{
	 $sql="select A.tota_vef_trab, C.id_requ, C.desc_requ, B.fkid_trab from tb_trabajos_actuales as A inner join tb_asignacion_trabajos_actuales as B on A.id_trab = B.fkid_trab 
inner join tb_requerimientos as C on A.fkid_requ = C.id_requ
where B.fkid_usuario =$id_usuario";
	 	$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->pagos1[] = $reg;
			}
			return $this->pagos1;
	}
	
/*	//Seleccion de los trabajos relacionado al usuario
	public function trabajoPorUsuarioSel($id_usuario,$id_requ)
	{
	 $sql="select C.id_requ, C.desc_requ, B.fkid_trab from tb_trabajos_actuales as A inner join tb_asignacion_trabajos_actuales as B on A.id_trab = B.fkid_trab 
inner join tb_requerimientos as C on A.fkid_requ = C.id_requ
where B.fkid_usuario =$id_usuario and C.id_requ = $id_requ";
	 	$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->pagos1[] = $reg;
			}
			return $this->pagos1;
	}*/
	
	

	public function guardarPago($usuarios,$trabajo,$fechadesde,$fechahasta,$monto,$numero,$image)
	{
			
	$sql="insert into tb_pagos values (null,'$usuarios','$trabajo','$fechadesde','$fechahasta','$monto','$numero','$image')";
		//en este caso  como el codi_clie de la BD es PRIMARY
		$reg = mysql_query($sql, Conectar::conecta());

		echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='../pagos/pagos.php';
			</script>";
	
	}
	public function misPagos($id_usuario)
	{
		$sql="select * from tb_pagos as A inner join tb_trabajos_actuales as B on A.fkid_trab = B.id_trab where A.fkid_usuario = $id_usuario";
		//en este caso  como el codi_clie de la BD es PRIMARY
		$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->pagos[] = $reg;
			}
			return $this->pagos;
	}
	//Lista Pagos Realizado
	public function reportePagos()
	{
		$sql="select * from tb_pagos as A inner join tb_trabajos_actuales as B on A.fkid_trab = B.id_trab inner join tb_usuarios as C on A.fkid_usuario = C.id_usuario";
		$res = mysql_query($sql,Conectar::conecta());
			while($reg = mysql_fetch_assoc($res))
			{
				$this->pagos1[] = $reg;
			}
			return $this->pagos1;
	}
	/*Paginado para los reporte de pagos*/
	public function paginadoPagos($inicio)
	{
		$sql = "select * from tb_pagos order by id_pago desc limit $inicio, 10";
		$res = mysql_query($sql, Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
		}
		return $this->datos;
	}
	

	public function listarPagos($codi_trab)
	{
		//$sql = "select * from tb_trabajos_actuales where id_usuario <> 0";
		$sql = "select * from tb_pagos where nume_depo = $codi_trab";
		$res = mysql_query($sql,Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
		}
		return $this->datos;
	}
	
	public function editarPagos($fecha_desde,$fecha_hasta,$monto_depo,$nume_depo)
	{
	$sql= "update tb_pagos set fecha_desde = '$fecha_desde', fecha_hasta = '$fecha_hasta' , monto_depo ='$monto_depo' where nume_depo = '$nume_depo'";
		 
		$reg = mysql_query($sql,Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido modificado satisfactoriamente');
			window.location='../pagos/modificar_pagos.php?codi_trab=$nume_depo';
			</script>";
		
		}
	
	

}