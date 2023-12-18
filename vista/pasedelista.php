<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
date_default_timezone_set("America/Mexico_City");
$object_usuario=new usuario();
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuD.html");
error_reporting(0);
if($_POST["IDss"]!=null){
$_SESSION["IDss"]=$_POST["IDss"];}
$array=$object_usuario->obtener_datos($_SESSION["IDss"]);

//include_once("../controlador/variables.php")
//$arrayq1=$object_usuario->evaluar1E($_POST["correo"]);
//$_SESSION["nombre"]=$array['nombre']."";
?>

<!--<style>
.containerlista{
            display: grid;
            width: 100%;
            height: 90%;
            grid-template-columns: 1fr;
            grid-template-rows: 10% 50% 20% 20%;
        }
</style>-->

<section style="height:70%;padding-top:0.1%">
    
<section style="width: 100%;height:100%;margin-left:0.5%">
        <br>
<center>

<div class="containerG2100">

<div style="background-color:rgba(255, 255, 255, 0.88);font-weight: bold;font-family:helvetica">
<br><br>
    
<div class="containerlista">

<label>Toma de Asistencia</label>    
    
<br><br>    
<table style="width:80%">
    <form>
    <tr >
        <th></th> 
        <th scope="col" style="float:right">Fecha:<input type="datetime" name="fecha"  value="<?php echo date("Y-m-d");?>"></th> 
    </tr>

    <tr>
            
            <tr>
            <td>&Aacute;rea de Trabajo</td><td><select  name="room" id="room"> <?php include("../modelo/conexion.php"); $consulta="SELECT ID,name FROM areastrabajo"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['ID']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></td>
            </tr>
            
            <tr>
            <td>Nombre del Trabajador</td><td><select  name="room" id="room"> <?php include("../modelo/conexion.php"); $consulta="SELECT ID,name FROM empleados order by name"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['ID']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></td>
            </tr>
            
            <tr>
            <td>Turno Asignado</td><td><select  name="room" id="room"> <?php include("../modelo/conexion.php"); $consulta="SELECT ID,name FROM turnos"; $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ?> <?php foreach ($ejecutar as $opciones):?> <option value="<?php echo $opciones['ID']?>" autocomplete="on"><?php echo $opciones['name']?></option> <?php endforeach ?> </select></td>
            </tr>
</table>  
<br><br>
<table style="width:80%">
    <tr><th>Observaciones:</th></tr>
    <tr><th><textarea rows="10" cols="80" name="Comment" id="Comment" required=""></textarea></th></tr>
    <tr><th><input type="submit" id="sit3" value="Guardar"></form></th></tr>
</table> 
    
</div>
    
    
    
</div>

<?php include_once("mapaempleados.php") ?>

</div>
       
</center>

</section>
</section>
<script src="../js/funciones.js"></script>
<?php }else{?>
        <section style="margin:12%">
        <center><p>usted, Empresa: "<?php echo $_SESSION["razonsocial"];?>"<br>
            ó persona: "<?php echo $_SESSION["nombre"];?>"<br> no ha iniciado sesion para acceder a este sitio<br>
        su firma es tipo <?php echo $_SESSION["usrFirmado"] ?></p><br>
        <a href="../vista/index.php"><button type="submit">volver a inicio</button></a>
        <br><a href="../controlador/logout.php"><button type="submit">Cerrar sesi&oacute;n</button></a>
        </center>
        <br></section>
    <?php phpinfo() ?>
<?php }
include_once("PieA.html");
?>