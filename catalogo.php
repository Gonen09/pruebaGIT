<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
    <head>
        <link type="text/css" rel="stylesheet" href="./css/stylesheet_catalogo.css"/>
        <title>Taller 6 AppInternet: Sesiones y Ajax</title>
    </head>
     
	<?php
        session_start();
        if (!isset($_SESSION['user'])) {
          header('location:login.html');
          exit();
        }
    ?>
	 		
    <script>
        
        function cargaBD(idProducto) { //str es el ID del usuario

            var xmlhttp;

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("detalle"+idProducto).innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","producto.php?idProducto=" + idProducto, true); //true: asincróno
            xmlhttp.send();
        }
        
        function obtenerImagen(id) {
					 
            var xmlhttp;

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("imagen"+id).innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","cargar_imagen.php?idProducto=" + id, true); //true: asincróno
            xmlhttp.send();
        }
        
		function cargar_imagen(){
					
            const CANTIDAD_IMAGENES = 3;

            for (i = 0; i <= CANTIDAD_IMAGENES; i++) {
                obtenerImagen(i);
            }
        }

		function resumen(idProducto){
					
            cargaBD(idProducto);
            document.getElementById("descripcion"+idProducto).style.display="none";
            document.getElementById("link"+idProducto).style.visibility="hidden";
            document.getElementById("volver"+idProducto).innerHTML="<< Volver";
        }

        function detalle(idProducto){

           document.getElementById("descripcion"+idProducto).style.display="initial";
           document.getElementById("detalle"+idProducto).innerHTML="";
           document.getElementById("link"+idProducto).style.visibility="visible";
           document.getElementById("volver"+idProducto).innerHTML="";
        }
        
	</script>
	
    <body onload="cargar_imagen()">
        <div id="navbar">
            <ul>
                <li>Home</li>
                <li>Noticias</li>
                <li>Catálogo</li>
                <li>FAQ</li>
                <li>Usuarios</li>
            </ul>
        </div>
		
		<div id="sesiones" style="margin-right: 100px; width: 300px; margin-left: 849px; margin-top: -40px;" margin-top:="" 20px;="" width:="" 640px;="">
            <form name="form-login" action="logout.php">
				<button id="login"><?php echo $_SESSION['user']?> : Cerrar Sesión</button>
			</form>
        </div>
        
        <div id="products">
            <h1>Catálogo de productos</h1>
            <table>
                <tr>
                    <td class="imagen">
                        <a href="/html/producto1.html" id="imagen1"></a>
                    </td>
                    
                    <td class="descripcion">
                        <h4>1080P HDMI Male to VGA Female Video Converter Adapter Cable</h4>
                        <p id="descripcion1">Una entrada HDMI al adaptador de salida VGA es la solución más conveniente y rentable para conectar sus dispositivos HDMI a sus monitores VGA o proyectores. Nuestro macho adaptador de HDMI a VGA hembra cuenta con un chip IC activo incorporado para lograr una mejor compatibilidad.</p>
						<h5 id ="link1" onclick="resumen(1)">Más Información [+]</h5>
						<p id="detalle1"></p>
						<h5 id="volver1" onclick="detalle(1)"></h5>
						
                    </td>
                </tr>
                <tr>
                    <td class="imagen">
                        <a href="/html/producto2.html" id="imagen2"></a>
                    </td>
                    
                    <td class="descripcion"> 
                        <h4>iPega PG-9028 Wireless Bluetooth Touch Game Controller</h4>
                        <p id="descripcion2">Este producto es un nuevo control inalámbrico bluetooth que soporta diferentes plataformas Android / iOS / PC. Se puede usar cuando se conecta via bluetooth sin ningún tipo de controlador.</p>
						<h5 id ="link2" onclick="resumen(2)">Más Información [+]</h5>
						<p id="detalle2"></p>
						<h5 id="volver2" onclick="detalle(2)"></h5>
					</td>
                </tr>
                <tr>
                    <td class="imagen">
                        <a href="/html/producto3.html" id="imagen3"></a>
                    </td>
                        
                    <td class="descripcion">
                        <h4>Syma X5SW WIFI FPV 2.4Ghz 4CH 6-Axis RC Quadcopter Drone</h4>
                        <p id="descripcion3">Los aviones FPV puede volar en interiores o al aire libre, se puede foto y vídeo FPV, 360 grados 3D rodando todo alrededor, con transmisión en tiempo real.</p>
						<h5 id ="link3" onclick="resumen(3)">Más Información [+]</h5>
						<p id="detalle3"></p>
                        <h5 id="volver3" onclick="detalle(3)"></h5>
					</td>
                </tr>
            </table>
        </div>
    </body>
</html>