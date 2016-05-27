<?php
    session_start();

    if (!isset($_SESSION['user'])) {
      //readfile('login.html');
      header('location:login.html');
      exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Tipos de Páginas </title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <style>
            p {color:black; width:80%; margin-left:20px;}
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body>
    <h1> Estos son sus datos. </h1>

    <?php
        echo "<p>".$_SESSION['user']."</p>";
        echo "<p>".$_SESSION['nombre']."</p>";
        echo "<p>".$_SESSION['apellido']."</p>";
    ?>
	<p> <a href="logout.php">Logout. </a> </p>
</body>
</html>