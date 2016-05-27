<!DOCTYPE html>
<html>

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body>
        <h1>Inserta PHP</h1>
        <?php
            $usuario = $_POST['usuario'];
            $nombre	 = $_POST['nombre'];
            $apellido= $_POST['apellido'];
            $foto    = $_FILES['foto']['name'];
            $region	 = $_POST['region'];

            $usuario_bd = 'invitado';
            $passwd_bd = 'enter';
            $nombre_bd = 'registro';

            try {
                $conn = new PDO('mysql:host=localhost;dbname='.$nombre_bd.';charset=utf8', $usuario_bd, $passwd_bd);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                print "Conectando";
            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }

            $stmt = $conn->prepare("INSERT INTO usuario values (:usuario,:nombre,:apellido,:foto,:region)");
            $stmt->bindParam(':usuario',$usuario);
            $stmt->bindParam(':nombre',$nombre);
            $stmt->bindParam(':apellido',$apellido);
            $stmt->bindParam(':foto',$foto);
            $stmt->bindParam(':region',$region);
            $stmt->execute();

            $uploaddir = "/usr/share/nginx/html/taller4/fotos/";
            $uploadfile = $uploaddir . $_FILES['foto']['name'];

            echo $uploadfile;

            if(move_uploaded_file ($_FILES['foto']['tmp_name'], $uploadfile )){
                echo "Foto subida";
            }else{
                echo "Error subida";
            }
            $conn = null;
        ?>
    </body>
</html>