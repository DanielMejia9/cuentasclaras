<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="shortcut icon" href="favicon.ico">
    <script  type="application/javascript" src="jscript/funciones.js"></script>
    <script type="text/javascript" src="jscript/jquery-1.4.2.min.js"></script>
    <script language="javascript" src="jscript/jquery-1.3.min.js"></script>
    <script src="jscript/jquery.ui.core.js"></script>
    <script src="jscript/jquery.ui.widget.js"></script>
    <script src="jscript/jquery.ui.datepicker.js"></script>
    
    <link rel="stylesheet" href="css/jquery.ui.all.css">
    <link href="css/style_menu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="pantalla">
    <div id="conten">
        <div id="top">TOP</div>
        <div id="fila_columna">
            <div id="columna1">columna1</div>
            <div id="columna2">
            	<?php include("trabajos_actuales.php"); ?>
            </div>
        </div>
    </div>
</div>    



</body>
    <frameset rows="50%,50%">
		<frame noresize="noresize" src="trabajos_actuales.php" />
		<frame noresize="noresize" src="trabajos_actuales.php" />
	</frameset><noframes></noframes>
</html>