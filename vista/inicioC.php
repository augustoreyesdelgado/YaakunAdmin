<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuC.html");
?>
        
        <section class="contenedor2c">

        <div class="containerF100">

        <div class="item" style="padding:1%">
        <div class="container1x9">
        <div class="item" ><img style="width: 100%;centered" src="img/ingresos.jpg"></div>
        <div class="item" ><a href="ingresoshotel.php"><img style="width: 100%;centered" onmouseout="this.src='img/HOTELIA.jpg'" onmouseover="this.src='img/HOTELI.jpg'" src="img/HOTELIA.jpg"></a></div>
        <div class="item" ><a href="ingresosdepartamento.php"><img style="width: 100%;centered" onmouseout="this.src='img/DEPARTAMENTOSIA.jpg'" onmouseover="this.src='img/DEPARTAMENTOSI.jpg'" src="img/DEPARTAMENTOSIA.jpg"></a></div>
        <div class="item" ><a href="ingresosrestaurant.php"><img style="width: 100%;centered" onmouseout="this.src='img/RESTAURANTIA.jpg'" onmouseover="this.src='img/RESTAURANTI.jpg'" src="img/RESTAURANTIA.jpg"></a></div>
        <div class="item" ><a href="ingresosestacionamiento.php"><img style="width: 100%;centered" onmouseout="this.src='img/ESTACIONAMIENTOIA.jpg'" onmouseover="this.src='img/ESTACIONAMIENTOI.jpg'" src="img/ESTACIONAMIENTOIA.jpg"></a></div>
        <div class="item" ><a href="ingresossalon.php"><img style="width: 100%;centered" onmouseout="this.src='img/SALONIA.jpg'" onmouseover="this.src='img/SALONI.jpg'" src="img/SALONIA.jpg"></a></div>
        <div class="item" ><a href="ingresoslavanderia.php"><img style="width: 100%;centered" onmouseout="this.src='img/LAVANDERIAIA.jpg'" onmouseover="this.src='img/LAVANDERIAI.jpg'" src="img/LAVANDERIAIA.jpg"></a></div>
        <div class="item" ><a href="ingresostelefonia.php"><img style="width: 100%;centered" onmouseout="this.src='img/TELEFONIAIA.jpg'" onmouseover="this.src='img/TELEFONIAI.jpg'" src="img/TELEFONIAIA.jpg"></a></div>
        <div class="item" ><a href="ingresosdiversos.php"><img style="width: 100%;centered" onmouseout="this.src='img/DIVERSOSIA.jpg'" onmouseover="this.src='img/DIVERSOSI.jpg'" src="img/DIVERSOSIA.jpg"></a></div>

        </div><!--container1x9-->
        </div>

        <div class="item" style="padding:1%">
        <div class="container1x9">
        <div class="item" ><img style="width: 100%;centered" src="img/egresos.jpg"></div>
        <div class="item" ><a href=""><img style="width: 100%;centered" onmouseout="this.src='img/HOTELEA.jpg'" onmouseover="this.src='img/HOTELE.jpg'" src="img/HOTELEA.jpg"></a></div>
        <div class="item" ><a href=""><img style="width: 100%;centered" onmouseout="this.src='img/DEPARTAMENTOSEA.jpg'" onmouseover="this.src='img/DEPARTAMENTOSE.jpg'" src="img/DEPARTAMENTOSEA.jpg"></a></div>
        <div class="item" ><a href=""><img style="width: 100%;centered" onmouseout="this.src='img/RESTAURANTEA.jpg'" onmouseover="this.src='img/RESTAURANTE.jpg'" src="img/RESTAURANTEA.jpg"></a></div>
        <div class="item" ><a href=""><img style="width: 100%;centered" onmouseout="this.src='img/ESTACIONAMIENTOEA.jpg'" onmouseover="this.src='img/ESTACIONAMIENTOE.jpg'" src="img/ESTACIONAMIENTOEA.jpg"></a></div>
        <div class="item" ><a href=""><img style="width: 100%;centered" onmouseout="this.src='img/SALONEA.jpg'" onmouseover="this.src='img/SALONE.jpg'" src="img/SALONEA.jpg"></a></div>
        <div class="item" ><a href=""><img style="width: 100%;centered" onmouseout="this.src='img/LAVANDERIAEA.jpg'" onmouseover="this.src='img/LAVANDERIAE.jpg'" src="img/LAVANDERIAEA.jpg"></a></div>
        <div class="item" ><a href=""><img style="width: 100%;centered" onmouseout="this.src='img/TELEFONIAEA.jpg'" onmouseover="this.src='img/TELEFONIAE.jpg'" src="img/TELEFONIAEA.jpg"></a></div>
        <div class="item" ><a href=""><img style="width: 100%;centered" onmouseout="this.src='img/DIVERSOSEA.jpg'" onmouseover="this.src='img/DIVERSOSE.jpg'" src="img/DIVERSOSEA.jpg"></a></div>
        
        </div><!--container1x9-->
        </div>

        <div class="item">
        <div class="container2x3">
        <div class="item" style="padding:2%"><a href="pasedelista.php"><img style="width: 100%;border-radius:10px;centered" onmouseout="this.src='img/LISTA.jpg'" onmouseover="this.src='img/LISTAA.jpg'" src="img/LISTA.jpg"></a></div>
        <div class="item" style="padding:2%"><a href=""><img style="width: 100%;border-radius:10px;centered" src="img/placeholder.jpg"></a></div>
        <div class="item" style="padding:2%"><a href=""><img style="width: 100%;border-radius:10px;centered" src="img/placeholder.jpg"></a></div>
        <div class="item" style="padding:2%"><a href=""><img style="width: 100%;border-radius:10px;centered" src="img/placeholder.jpg"></a></div>
        <div class="item" style="padding:2%"><a href=""><img style="width: 100%;border-radius:10px;centered" src="img/placeholder.jpg"></a></div>
        <div class="item" style="padding:2%"><a href=""><img style="width: 100%;border-radius:10px;centered" src="img/placeholder.jpg"></a></div>
        </div><!--container2x3-->
        </div>

        

        </div><!--containerF100-->

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