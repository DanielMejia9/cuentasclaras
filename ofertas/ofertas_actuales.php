<?php 
include("start.php");
//include("../class/class.php");
include("conexion.php");
include("../controle/vSession.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ofertas Actuales</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<style type="text/css">
	/* CSS demo */
	#content{
		padding:12px 0 0 10px;
		float: left;
	}
	#content .filtro{
		overflow:hidden;
		padding-bottom:15px
	}
	#content .filtro select{
		width:100px;
	}
	#content .filtro ul{
		list-style:none;
		padding:0
	}
	#content .filtro li{
		float:left;
		display:block;
		margin:0 5px
	}
	#content .filtro li a{
		color:#006;
		position:relative;
		top:5px;
		text-decoration:underline;
		padding: 3px 10px 7px 10px;
	}
	#content .filtro li label{
		float:left;
		padding:4px 5px 0 0
	}
	#content table{
		border-collapse:collapse;
		width:940px;
	}
	#content table th{
		border:1px solid #999;
		padding:8px;
		background:#F8F8F8
	}
	#content table th span{
		cursor:pointer;
		padding-right:12px
	}
	#content table th span.asc{
		background:url(assets/imgs/sorta.gif) no-repeat right center;
	}
	#content table th span.desc{
		background:url(assets/imgs/sortd.gif) no-repeat right center;
	}
	#content table td{
		border:1px solid #999;
		padding:6px
	}
	
</style>
<link rel="stylesheet" type="text/css" href="assets/jqueryui/css/smoothness/jquery-ui-1.8.16.custom.css"/>
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico">
<script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="assets/jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/js.js"></script>
<script type="text/javascript" src="../jscript/funciones.js"></script>
</head>
<body onload="filtrar();">

<div id="top">
        	<div id="logo">
            	<img src="../images/logo.png"  /><div id="tituloSistem">Cuentas Claras</div> 
                <div id="liDet"><span style="padding-left:5px;color: #2C4463;"><?php echo ("Bienvenido! "). ucwords ($nomUser);?></span></div>
             </div>
             <?php
	if (isset($_SESSION['k_username'])) {
		$nomUser = ($_SESSION['k_username']);
		$valSes = 1;
		}
		else{
		$valSes = 2;
		}
	   ?>
</div>       
<div id="fila_columna_filtro">
          <div id="columna1">
                <?php include("../include/menu.php")?>
          </div>
    	  <div id="columna2">
                <div id="cuerpo_general">
               	 	<div id="tilulos">
                     	<h2 style="padding-top:12px; width:200px;float:left;">Ofertas actuales</h2>
                            <div id="botenes">
                            	<div id="content">
                                    <div class="filtro">
                                        <form id="frm_filtro" name="frm_filtro" method="post" action="">
                                        	<input type="hidden" name="cod_uniofer" id="cod_uniofer" />
                                                <ul>
                                                    <li><label>Usuarios:</label>
                                                        <select id="usuario" name="usuario">
                                                            <option value="0">--</option>
                                                            <!-- Listar Paises -->
                                                            <?php
                                                            $query = mysql_query("SELECT * FROM tb_usuarios"); 
                                                            while($row = mysql_fetch_array($query)){
                                                                ?>
                                                                <option value="<?php echo $row['id_usuario'] ?>">
                                                                    <?php echo utf8_encode($row['nomb_usuario']) ?>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>                	
                                                    </li>
                                                     <li><label>Categoria:</label>
                                                        <select id="categoria" name="categoria">
                                                            <option value="0">--</option>
                                                            <!-- Listar Paises -->
                                                            <?php
                                                            $query = mysql_query("SELECT * FROM tb_requerimientos"); 
                                                            while($row = mysql_fetch_array($query)){
                                                                ?>
                                                                <option value="<?php echo $row['id_requ'] ?>">
                                                                    <?php echo utf8_encode($row['desc_requ']) ?>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>                	
                                                    </li>
                                                    <li>
                                                        <button type="button" id="btnfiltrar" class="btn" >Filtrar</button>
                                                    </li>                
                                                    <li>
                                                        <a href="javascript:;" id="btncancel" class="btn">Todos</a>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                  </div>
                   				<div style="width:60px; float:left; margin:0px 20px 0px 35px; "><!--Boton consultar--->
                                    <center>
                                        <a href="ofertas_actuales.php">
                                            <img src="../images/ico-consu.png" border="0" width="30" />
                                            <div>Consulta</div>	
                                        </a>
                                    </center>
                        		</div><!--Cierre boton consultar-->
                                <div style="width:60px; float:left; margin:0px 20px 0px 0px">
                                    <center>
                                        <a href="add_ofertas.php">
                                            <img src="../images/ico-add.png" border="0" width="30" onclick="addTrabajo();" />
                                            <div>Añadir</div>	
                                        </a>
                                    </center>
                                </div>
                    		</div>	
                    </div>
                        <div id="contenedor-cliente">
                            <center>
                                <div id="sub-contenedor-cliente"> 
                                    <div class="fila tabla titulo">
                                                <div class="columna tabla corto">ID</div>
                                                <div class="columna tabla corto">Prio</div>
                                                <div class="columna tabla largo">Categorias</div>
                                                <div class="columna tabla largo">Trabajo</div>
                                                <div class="columna tabla largo">Proyecto</div>
                                                <div class="columna tabla medio">Total BSF</div>
                                                <div class="columna tabla medio">Solicitud del Usuario</div>
                                                <div class="columna tabla corto">V/M</div>
                                                <div class="columna tabla corto">Elim.</div>  
                                                 
                                    </div>
                                    <div id="resultado"></div>
                                </div>
                          </center>
                      </div>  
                    
                </div>        
          </div>    
    </div>
</body>
</html>