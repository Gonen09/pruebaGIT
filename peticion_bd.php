<?php
    $id_producto = $_GET['id'];
    
    $usuario_bd = 'invitado';
    $password_bd = 'enter';
    $bd = 'catalogo';

    try {
        $conn = new PDO('mysql:host=localhost;dbname='.$bd.';charset=utf8', $usuario_bd, $passwd_bd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $stmt = $conn->prepare("SELECT precio, descripcion, detalle FROM productos WHERE id = :id");
    $stmt->bindParam(':id',$id_producto);
    $stmt->execute();

    $precio = array();
    $descripcion = array();
    $detalle = array();

    while($row = $stmt->fetch()){
        array_push($precio,$row['precio']);
        array_push($descripcion,$row['descripcion']);	
        array_push($detalle,$row['detalle']);
    }	
    
    $connection = null;
?>