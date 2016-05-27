<?php
    session_start();
    if (!isset($_SESSION['user'])) {
      readfile('login.html');
    }
    session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Tipos de Páginas </title>
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<style>
			p {
				color:black; 
				width:80%; 
				margin-left:20px;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<h1> Su session ha terminado. </h1>
		<p> <a href="login.html">Ingresar nuevamente. </a> </p>
	</body>
</html>