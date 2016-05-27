<?php

	$id_producto = $_GET['idProducto'];
	
	/*Datos de conexion*/
	$usuario = 'invitado';
	$passwd  = 'enter';
	$bd		 = 'catalogo';
	
	try {
		$conn = new PDO('mysql:host=localhost;dbname='.$bd.';charset=utf8', $usuario, $passwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		print "¡Error!: " . $e->getMessage() . "<br/>";
		die();
	}	

		
	$stmt = $conn->prepare("SELECT ruta FROM imagenes WHERE id_producto=:id_producto");
	$stmt->bindParam(':id_producto',$id_producto);
	$stmt->execute();
	
	if($row = $stmt->fetch()){
		echo "<img src=\"".$row['ruta']."\">"; 
	}	
	
	$conn = null;
?>