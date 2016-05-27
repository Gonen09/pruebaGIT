<?php
	$id_producto = $_GET['idProducto'];

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

	$stmt = $conn->prepare("SELECT precio,detalle FROM productos WHERE id = :id_producto");
    $stmt->bindParam(":id_producto", $id_producto);
	$stmt->execute();


    if($row = $stmt->fetch()){
        $detalle = $row['detalle'];
        $precio = $row['precio'];

        echo $detalle."<br><h3>Precio: $".$precio."</h3>";
    }

    $stmt = $conn->prepare("SELECT ruta FROM imagenes WHERE id_producto = :id_producto");
    $stmt->bindParam(":id_producto", $id_producto);
		$stmt->execute();

    if( $id_producto == 1) {
        echo document.getElementById("img1").innerHTML="<img src=\"".$row['ruta']."\">";
    }


    $num_imagen = 1;

    echo "<table id = "miniatura">";
    echo    "<tr>"
            while( $row = stmt->fetch() ){
               if( $num_imagen != 1){ //Evita la primera imagen
                   echo "<td><img src=\"".$row['ruta']."\"></td>";
               }
               $num_imagen++;
            }
    echo     "</tr>"
    echo "</table>"

    $conn = null;
?>
