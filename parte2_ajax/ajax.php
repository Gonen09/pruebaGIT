<?php
    $nombre_usuario = $_GET['nombre'];

    //echo $nombre_usuario." <br/>";

    $usuario_bd = 'invitado';
    $passwd_bd = 'enter';
    $nombre_bd = 'registro';

    try {
    //	print "Conectando";
        $conn = new PDO('mysql:host=localhost;dbname='.$nombre_bd.';charset=utf8', $usuario_bd, $passwd_bd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $stmt = $conn->prepare("SELECT * FROM usuario WHERE user = :usuario");
    $stmt->bindParam(':usuario',$nombre_usuario);
    $stmt->execute();

    if($row = $stmt->fetch()){
    //asume un sólo usuario con el id dado
        echo "<table border = \"1\"> \n";
            echo "<tr>";
            echo "<td> User: </td>";
            echo "<td> ".$row['user']." </td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td> Nombre: </td>";
            echo "<td> ".$row['nombre']." </td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td> Apellido: </td>";
            echo "<td> ".$row['apellido']." </td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td> Foto: </td>";
            echo '<td> <img src="/taller4/fotos/'.$row['foto'].'" alt="Foto usuario"/> </td>';
            echo "</tr>";
            echo "<tr>";
            echo "<td> Region: </td>";
            echo "<td> ".$row['region']." </td>";
            echo "</tr>";
        echo "</table>";
    } else {
        echo "<p class=importante> Usuario no encontrado </p>";
    }
    $conn = null;
?>
