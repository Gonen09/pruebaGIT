<?php

    $nombre_usuario = $_POST['nombre'];
    $usuario_bd = 'invitado';
    $passwd_bd = 'enter';
    $bd = 'catalogo';
    
    try {
        $conn = new PDO('mysql:host=localhost;dbname='.$bd.';charset=utf8', $usuario_bd, $passwd_bd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    //    print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $stmt = $conn->prepare("SELECT * FROM usuario WHERE user = :usuario");
    $stmt->bindParam(':usuario',$nombre_usuario);
    $stmt->execute();

    //CAMBIOS!!!!
    if($row = $stmt->fetch()){
        //asume un sólo usuario con el id dado
        session_start();
        $_SESSION['user'] = $nombre_usuario;
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        header('location:home.php');
    } else {
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
                    <p class=importante> Usuario no encontrado </p>
                    <p> <a href="login.html">Intentar nuevamente. </a> </p>
                </body>
            </html>
        <?php
    }
    $conn = null;
?>

