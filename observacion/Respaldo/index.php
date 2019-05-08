<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script  type="application/javascript" src="jscript/funciones.js"></script>
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<title>Cuentas Claras</title>
</head>
<body>
<div id="pantalla">
	<div id="contenedorlogin">
    	<div id="toplogin">
        	<div id="imageLogo">
        		<img src="images/logo.png" />
            </div>
            <div id="tituloLogin">Cuentas Claras</div>
        </div>
        <div id="cln1">
        		<span style="font-size: 29px; margin: 52px 0px 0px 63px;position: absolute;">Iniciar Sesión</span>
        		<div id="login">
                <form id="login" name="login" method="post" action="validar.php">
                    <input type="text" placeholder="Usuario" size="20" id="usuario" name="usuario" />
                    <input type="password" placeholder="Contraseña" id="password" name="password" size="20"  />
                    <input type="submit" value="Entrar" id="btnEntrar" onclick="validarUser();"  />
                </form>
                </div>
                <span style="  font-size: 12px; margin: 18px 0px 0px 63px; position: absolute; width: 464px; text-align: center;">
                Si tiene alguna pregunta o necesita más información, por 
				favor contacta al Equipo de Servicio al Cliente.
				</span>
        </div>
        <div id="cln2"><img src="images/img_cohete.png" /></div>
        <div id="footer"></div>
    </div>
</div>
</body>
</html>