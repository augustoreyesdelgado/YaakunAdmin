<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuI.html");
?>
        
        <section class="contenedor2c">
        <div class="containerF">
        <div class="item" style="padding:2%"><center>
        <a href="selecciondehabitaciones.php"><img style="width: 90%;border-radius:10px;centered" onmouseout="this.src='img/supervision.png'" onmouseover="this.src='img/supervisionA.jpg'" src="img/supervision.png"></a></center>
        </div>
        <div class="item">
        <div class="containerG">
        <div class="item" style="padding:2%"><a href="Listahabitaciones.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/Habitaciones.jpg'" onmouseover="this.src='img/HabitacionesA.jpg'" src="img/Habitaciones.jpg"></a></div>
        <div class="item" style="padding:2%"><a href="Listadispositivos.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/Botones.jpg'" onmouseover="this.src='img/BotonesA.jpg'" src="img/Botones.jpg"></a></div>
        <div class="item" style="padding:2%"><a href=""><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/Estructura.jpg'" onmouseover="this.src='img/EstructuraA.jpg'" src="img/Estructura.jpg"></a></div>
        <div class="item" style="padding:2%"><a href="Listaareascomunes.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/areascomunes.jpg'" onmouseover="this.src='img/areascomunesA.jpg'" src="img/areascomunes.jpg"></a></div>
        <div class="item" style="padding:2%"><a href="Listapasillos.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/pasillos.jpg'" onmouseover="this.src='img/pasillosA.jpg'" src="img/pasillos.jpg"></a></div>
        <div class="item" style="padding:2%"><a href="Listapasillos.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/cocina.jpg'" onmouseover="this.src='img/cocinaA.jpg'" src="img/cocina.jpg"></a></div>
        <div class="item" style="padding:2%"><a href="Listapasillos.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/instalacion.jpg'" onmouseover="this.src='img/instalacionA.jpg'" src="img/instalacion.jpg"></a></div>
        <div class="item" style="padding:2%"><a href="Listapasillos.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/lavanderia.jpg'" onmouseover="this.src='img/lavanderiaA.jpg'" src="img/lavanderia.jpg"></a></div>
        <div class="item" style="padding:2%"><a href="Listapasillos.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/bodega.jpg'" onmouseover="this.src='img/bodegaA.jpg'" src="img/bodega.jpg"></a></div>

        </div>
        </div>
        </div>
        </section>
<?php }else{?>
        <section style="margin:12%">
        <center><p>Inicie sesi&oacute;n por favor</p><br>
        <a href="../index.php"><button type="submit">volver a inicio</button></a>
        <br><a href="../controlador/logout.php"><button type="submit">Cerrar sesi&oacute;n</button></a>
        </center>
        <br></section>
<?php }
include_once("PieA.html");
?>