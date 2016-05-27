<!DOCTYPE html>
<html>
   <?php
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $foto = $_FILES['foto']['name'];
            $region = $_POST['region'];
            
            echo $usuario; 
            echo $foto;
    
            $usuario_bd = 'invitado';
            $passwd_bd = 'enter';
            $bd = 'registro';
        
            try {
                $conn = new PDO('mysql:host=localhost;dbname='.$bd.';charset=utf8', $usuario_bd, $passwd_bd);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }

            $stmt = $conn->prepare("INSERT INTO usuario VALUES (:usuario, :nombre, :apellido, :foto, :region)");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':foto', $foto);
            $stmt->bindParam(':region', $region);
            $stmt->execute();

            $upploaddir = "/usr/share/nginx/html/taller6/fotos/"; //DAR PERMISOS A LA CARPETA
            $uploadfile = $uploaddir.$foto;
            
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile))
                echo "</br>Su foto se ha subido correctamente";
            else 
                echo "La foto no se ha subido";
        
            $conn = null;
    ?>
    
    <head>
        <title> Tipos de Páginas </title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <meta http-equiv="refresh" content="4; url=index.php">
        <style>
            p {color:black; width:80%; margin-left:20px;}
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body>
        <h1> Usuario registrado </h1>
        <h2> Esta página se redirigirá a login.html en 4 segundos</p>
		<p> <a href="login.html">Ingresar nuevamente.</a></p>
    </body>
</html>
