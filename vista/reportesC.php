<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuE.html");
$object_usuario=new usuario();
$array=$object_usuario->obtener_datos_objeto($_POST["IDss"]);
?>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/plotly-latest.min.js"></script>
<section style="height:80%;padding-top:0.1%">
<section style="width: 99%;margin-left:0.5%">
        <br>
    
        <div class="containerGm">
        
        <div class="item" style="padding:5.5%">
        <form id="frm" method="post" action="../vista/habitacion.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $array["room"];?>">
        <input id="input2" type="submit" value="Volver a habitaci&oacute;n <?php echo $array["room"];?>">      
        </form>  
        </div>
        
        <div class="item" style="padding:5.5%">
        <label style="color:white">Registros de: <?php echo $array["Dmodel"];?></label><br>
        <label style="color:white">Habitaci&oacute;n: <?php echo $array["room"];?></label>
        </div>
        
        <div class="item" style="padding-top:5%">
        <div class="containerGm">
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        </div>
        </div>
        </div> 
    
        <center>
        <div class= "cont" style="color:white;font-family: helvetica;background-color:rgba(0, 0, 0, 0.67)">
        
        <div>
        <label>Seleccione el tipo reporte</label><br>
        <label>Mantenimiento</label><input type="radio" name="q1" onchange="Mantenimiento()" required><br>    
        <label>Falla</label><input type="radio" name="q1" onchange="Falla()">
        </div><br>
         <div id ="extra1" >
         </div>    
            
        <div id ="extra2" >
         </div>      
            
		</div>
            
        <form id="frm" method="post" action="../vista/habitacion.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $array["room"];?>">
        <input id="input2" type="submit" value="Cancelar">      
        </form> 
</center>
    
        
    
</section>
</section>

<script>
    function Mantenimiento(){
     document.getElementById("extra1").innerHTML = '<form id="frm" method="post" action="../controlador/reporteX.php">            <table>        <tr><th style="float:left">Fecha:</th><th><input type="date" id="sit3" name="Idate" id="Idate" required></th></tr><tr><th style="float:left">Costo:</th><th><input type="number" id="sit3" name="Bcost" id="Bcost" placeholder="1000.00" autocomplete="on" required></th></tr></table></form><label>Bueno</label><input type="radio" name="q2" onchange="Estado()" required><br><label>Regular</label><input type="radio" name="q2" onchange="Estado()"><br><label>Malo</label><input type="radio" name="q2" onchange="Estado()">';
     }
    function Falla(){
     document.getElementById("extra1").innerHTML = '<form id="frm" method="post" action="../controlador/reporteF.php"> <table> <tr> <th style="float:left"> Nombre: </th><th> <input type="text" id="sit3" name="Name" id="Name" placeholder="abc" autocomplete="on" required> </th> </tr> <tr> <th style="float:left"> Marca: </th> <th> <label><select name="Brand" id="Brand"> <?php include("../modelo/conexion.php"); $consulta="SELECT * FROM brands"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDb']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></label> </th> </tr> <tr> <th style="float:left"> Categoria: </th> <th> <label><select name="Category" id="Category"> <?php include("../modelo/conexion.php"); $consulta="SELECT * FROM dicategories where clasification=1"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDc']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></label> </th> </tr> <tr> <th style="float:left"> F.Compra: </th> <th> <input type="date" id="sit3" name="Idate" id="Idate" required> </th> </tr> <tr> <th style="float:left"> Costo: </th> <th> <input type="number" id="sit3" name="Bcost" id="Bcost" placeholder="1000.00" autocomplete="on" required> </th> </tr> <tr> <th style="float:left"> Habitaci&oacute;n </th> <th> <input type="number" id="sit3" name="room" id="room" placeholder="101" autocomplete="on" required> </th> </tr> </table> <br><input type="submit" id="sit3" value="Registrar"></form>';
     }
    function Consumible(){
     document.getElementById("extra1").innerHTML = '<table> <tr> En construcci&oacute;n </tr> </table>';
     }
    function Estado(){
     document.getElementById("extra2").innerHTML = '<tr><th style="float:left">Observaciones</th><th><textarea rows="5" cols="50" name="nombre" ></textarea></th></tr><tr><th style="float:left">Firma: </th><th><input type="text" id="sit3" name="Comment" id="Comment" placeholder="Administrador" autocomplete="on" required></th></tr><br><input id="IDD" name="IDD" type="hidden" value="<?php echo $_POST["IDss"];?>"><br><input type="submit" id="sit3" value="Registrar">';
     }
</script>
<script src="../js/funciones.js"></script>
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