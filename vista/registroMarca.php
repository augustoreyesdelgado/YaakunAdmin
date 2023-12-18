<?php
session_start();
include("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuE.html");
?><br><br>

        <center>
        <div class= "cont" style="color:white;font-family: helvetica;background-color:rgba(0, 0, 0, 0.67)">
        <center>Registrar Nuevo Objeto</center>
        <br>
        
            
        <table>
         <tr>
         <th align="left"><center>Seleccione el tipo de objeto</center></th>
         
         </tr>
         <tr>
         <th>
         <table border="1">
         <tr>
             <td>Dispositivo</td><td>Mueble</td><td>Consumible</td>
         </tr>
         <tr>
             <td><input type="radio" name="q1" onchange="Dispositivo()" required></td>
             <td><input type="radio" name="q1" onchange="Mueble()"></td>
             <td><input type="radio" name="q1" onchange="Consumible()"></td>
         </tr>
         </table>
         </th>
         </tr>
         </table><br>
    
         <div id ="extra1" >
         </div>
             
        
		</div>
            
        <a href="inicioE.php"><button type="submit">Cancelar</button></a>
</center><br>
<script>
    function Dispositivo(){
     document.getElementById("extra1").innerHTML = '<form id="frm" method="post" action="../controlador/registroDis.php"> <table> <tr> <th style="float:left"> Nombre: </th><th> <input type="text" id="sit3" name="Name" id="Name" placeholder="abc" autocomplete="on" required> </th> </tr> <tr> <th style="float:left"> Marca: </th> <th> <label><select name="Brand" id="Brand"> <?php include("../modelo/conexion.php"); $consulta="SELECT * FROM brands"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDb']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></label> </th> </tr> <tr> <th style="float:left"> Categoria: </th> <th> <label><select name="Category" id="Category"> <?php include("../modelo/conexion.php"); $consulta="SELECT * FROM dicategories where clasification=0 order by name"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDc']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></label> </th> </tr> <tr> <th style="float:left"> F.Compra: </th> <th> <input type="date" id="sit3" name="Idate" id="Idate" required> </th> </tr> <tr> <th style="float:left"> Costo: </th> <th> <input type="number" step="any" id="sit3" name="Bcost" id="Bcost" placeholder="1000.00" autocomplete="on" required> </th> </tr> <tr> <table border="1"><td>Habitaci&oacute;n</td><td>Pasillo</td><td>Area Com&uacute;n</td><td>Cocina</td></tr><tr><td><input type="radio" name="q3" onchange="rooms()" required></td><td><input type="radio" name="q3" onchange="hallways()"></td><td><input type="radio" name="q3" onchange="common()"></td><td><input type="radio" name="q3" onchange="kitchen()"></td></tr></table> <div id ="extra2" ></div>';
     }
    function Mueble(){
     document.getElementById("extra1").innerHTML = '<form id="frm" method="post" action="../controlador/registroDis.php"> <table> <tr> <th style="float:left"> Nombre: </th><th> <input type="text" id="sit3" name="Name" id="Name" placeholder="abc" autocomplete="on" required> </th> </tr> <tr> <th style="float:left"> Marca: </th> <th> <label><select name="Brand" id="Brand"> <?php include("../modelo/conexion.php"); $consulta="SELECT * FROM brands"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDb']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></label> </th> </tr> <tr> <th style="float:left"> Categoria: </th> <th> <label><select name="Category" id="Category"> <?php include("../modelo/conexion.php"); $consulta="SELECT * FROM dicategories where clasification=1 order by name"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDc']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></label> </th> </tr> <tr> <th style="float:left"> F.Compra: </th> <th> <input type="date" id="sit3" name="Idate" id="Idate" required> </th> </tr> <tr> <th style="float:left"> Costo: </th> <th> <input type="number" step="any" id="sit3" name="Bcost" id="Bcost" placeholder="1000.00" autocomplete="on" required> </th> </tr> <table border="1"><td>Habitaci&oacute;n</td><td>Pasillo</td><td>Area Com&uacute;n</td><td>Cocina</td></tr><tr><td><input type="radio" name="q3" onchange="rooms()" required></td><td><input type="radio" name="q3" onchange="hallways()"></td><td><input type="radio" name="q3" onchange="common()"></td><td><input type="radio" name="q3" onchange="kitchen()"></td></tr></table> <div id ="extra2" ></div>';
     }
    function Consumible(){
     document.getElementById("extra1").innerHTML = '<form id="frm" method="post" action="../controlador/registroCon.php"> <table> <tr> <th style="float:left"> Nombre: </th><th> <input type="text" id="sit3" name="Name" id="Name" placeholder="abc" autocomplete="on" required> </th> </tr>  <tr> <th style="float:left"> Categoria: </th> <th> <label><select name="Category" id="Category"> <?php include("../modelo/conexion.php"); $consulta="SELECT * FROM dicategories where clasification=3 order by name"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDc']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></label> </th> </tr> <tr> <th style="float:left"> F.Compra: </th> <th> <input type="date" id="sit3" name="Idate" id="Idate" required> </th> </tr> <tr> <th style="float:left"> Costo: </th> <th> <input type="number" step="any" id="sit3" name="Bcost" id="Bcost" placeholder="1000.00" autocomplete="on" required> </th> </tr> <table border="1"><td>Habitaci&oacute;n</td><td>Pasillo</td><td>Area Com&uacute;n</td><td>Cocina</td></tr><tr><td><input type="radio" name="q3" onchange="rooms()" required></td><td><input type="radio" name="q3" onchange="hallways()"></td><td><input type="radio" name="q3" onchange="common()"></td><td><input type="radio" name="q3" onchange="kitchen()"></td></tr></table> <div id ="extra2" ></div>';
     }
    function rooms(){
     document.getElementById("extra2").innerHTML = '<tr> <th style="float:left"> Habitaci&oacute;n </th> <th> <label><select id="sit3" name="room" id="room"> <?php include("../modelo/conexion.php"); $consulta="SELECT IDr FROM rooms where sort!='7' and sort!='8' and sort!='9' order by IDr"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDr']?>" autocomplete="on"><?php echo $opciones['IDr']?></option> <?php endforeach ?> </select></label> </th> </tr> </table> <br><br><input type="submit" id="sit3" value="Registrar"></form>';
     }
    function hallways(){
     document.getElementById("extra2").innerHTML = '<tr> <th style="float:left"> Pasillo </th> <th> <label><select id="sit3" name="room" id="room"> <?php include("../modelo/conexion.php"); $consulta="SELECT IDr, rname FROM rooms where sort='7' order by rname"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDr']?>" autocomplete="on"><?php echo $opciones['rname']?></option> <?php endforeach ?> </select></label> </th> </tr> </table> <br><br><input type="submit" id="sit3" value="Registrar"></form>';
     }
    function common(){
     document.getElementById("extra2").innerHTML = '<tr> <th style="float:left"> Area Com&uacute;n </th> <th> <label><select id="sit3" name="room" id="room"> <?php include("../modelo/conexion.php"); $consulta="SELECT IDr, rname FROM rooms where sort='9' order by rname"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDr']?>" autocomplete="on"><?php echo $opciones['rname']?></option> <?php endforeach ?> </select></label> </th> </tr>  </table> <br><br><input type="submit" id="sit3" value="Registrar"></form>';
     }
    function kitchen(){
     document.getElementById("extra2").innerHTML = '<tr> <th style="float:left"> Cocina </th> <th> <label><select id="sit3" name="room" id="room"> <?php include("../modelo/conexion.php"); $consulta="SELECT IDr, rname FROM rooms where sort='8' order by rname"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['IDr']?>" autocomplete="on"><?php echo $opciones['rname']?></option> <?php endforeach ?> </select></label> </th> </tr>  </table> <br><br><input type="submit" id="sit3" value="Registrar"></form>';
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
