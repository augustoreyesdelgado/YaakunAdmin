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
        <div class= "contc" style="color:white;font-family: helvetica;background-color:rgba(0, 0, 0, 0.67)">
        
        <div class="containerG2r">
        <div class="item">
        <table>
         <tr>
         <th align="left"><center>Seleccione Acci&oacute;n</center></th>
         
         </tr>
            
         <tr>
         <th>
         <table>
         <tr>
             <td>Reporte de Mantenimiento</td><td>Agendar mantenimiento</td>
         </tr>
         <tr>
             <td><input type="radio" name="q1" onchange="Mantenimiento()" required></td>
             <td><input type="radio" name="q1" onchange="Book()"></td>
         </tr>
         </table>
         </th>
         </tr>
            
         </table>
        </div>
        <div class="item">
         <div id ="extra1" >
         </div>
        </div>
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
     document.getElementById("extra1").innerHTML = '<form id="frm" method="post" action="../controlador/reporteM.php">            <table>        <tr><th style="float:left">Fecha:</th><th><input type="date" id="sit3" name="Idate" id="Idate" required></th></tr><tr><th style="float:left">Costo:</th><th><input type="number" id="sit3" name="Bcost" id="Bcost" placeholder="1000.00" autocomplete="on" required></th></tr></tr><tr><td><center>Bueno</center></td><td><center>Regular</center></td><td><center>Malo</center></td></tr><tr><td><input type="radio" value="1" name="estado" id="estado" required></td><td><input type="radio" value="2" name="estado" id="estado"></td><td><input type="radio" value="3" name="estado" id="estado"></td></tr><tr><th style="float:left">Observaciones</th><th><textarea rows="5" cols="20" name="Comment" id="Comment" ></textarea></th></tr><tr><th style="float:left">Firma: </th><th><input type="text" id="sit3" name="firm" id="firm" placeholder="Administrador" autocomplete="on" required></th></tr></table><input id="IDD" name="IDD" type="hidden" value="<?php echo $_POST["IDss"];?>"><br><input type="submit" id="sit3" value="Registrar"></form>';
     }
    function Book(){
     document.getElementById("extra1").innerHTML = '<form id="frm" method="post" action="../controlador/agendarML.php"><table><tr><th style="float:left">Fecha:</th><th><input type="date" id="sit3" name="Nmaintenance" id="Nmaintenance" required></th></tr></table><input id="IDD" name="IDD" type="hidden" value="<?php echo $_POST["IDss"];?>"><br><input type="submit" id="sit3" value="Registrar"></form>';
     }
</script>
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