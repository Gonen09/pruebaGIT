<?php

    $nombre_usuario = $_POST['user'];

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

    $stmt = $conn->prepare("SELECT * FROM usuario WHERE user = :usuario");
    $stmt->bindParam(':usuario', $nombre_usuario);
    $stmt->execute();

    if($row = $stmt->fetch()){
        session_start();
        $_SESSION['user'] = $nombre_usuario;
        header('location:catalogo.php');
    } else {
?>
        <!DOCTYPE html>
        <html>
            <head>
            </head>
            <body>
                <div id="volver">
                    <form name="form-volver" action="login.html">
                        <button id="volver">Volver</button>
                    </form>
                </div>
                
                <?php
                    echo "<p>El usuario no existe</p>";
                ?>
            </body>
        </html>
    <?php   
    }
    $conn = null;
    ?>

