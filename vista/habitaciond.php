<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
date_default_timezone_set("America/Mexico_City");
$object_usuario=new usuario();
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuE.html");
error_reporting(0);
if($_POST["IDss"]!=null){
$_SESSION["IDss"]=$_POST["IDss"];}
$array=$object_usuario->obtener_datos($_SESSION["IDss"]);
//$arrayq1=$object_usuario->evaluar1E($_POST["correo"]);
//$_SESSION["nombre"]=$array['nombre']."";
?>

<section style="height:70%;padding-top:0.1%">
    
<section style="width: 99%;margin-left:0.5%">
        <br>
    
        <div class="containerGm">
        
        <div class="item" style="padding:5.5%">
        <label style="color:white">Numero de habitaci&oacute;n: </label><label><?php echo $array['IDr']?></label><br>
        <label style="color:white">Categor&iacute;a: </label><label><?php echo $array['Rsort']?></label>
        </div>
        
        <div class="item" >
        </div>
        
        <div class="item" style="padding-top:5%">
        <div class="containerGm">
        <div class="item"></div>
        <div class="item"><center><button>Imprimir Tabla</button></center></div>
        <div class="item"></div>
        </div>
        </div>
        </div>  
<center>

<div class="table-wrapper-scroll-y my-custom-scrollbar">

<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    <th scope="col" style="width:0.5%">ID</th>
    <th scope="col" style="width:7%">Modelo</th>
    <th scope="col" style="width:2%">Categoria</th>
    <th scope="col" style="width:2%">Fecha de Compra</th>
    <th scope="col" style="width:3%">Costo ($MXM)</th>
    <th scope="col" style="width:1%">Proxima Revisión</th>
    <th scope="col" style="width:1%">Acciones</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
$sql="SELECT * FROM `consumables` as c inner join dicategories as d on c.Category=d.IDc where room='".$array['IDr']."'";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    <td scope="row" style="word-break: break-all;background-color:blue;color:white"><?php echo $mostrar['IDcs']; ?></td>
    <td  id="especel3"><?php echo $mostrar['cname']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['name']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Idate']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Bcost']; ?></td>
    
    <?php 
      $fecha_actual = strtotime(date("d-m-Y"));
      $fecha_entrada = strtotime($mostrar['expiration']);
      if($fecha_actual < $fecha_entrada){?>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['expiration']; ?></td>
    <?php } else if ($fecha_actual == $fecha_entrada){ ?>
    <td  style="word-break: break-all;background-color:#ddd51c"><?php echo $mostrar['expiation']; ?></td>  
    <?php } else { ?>
    <td  style="word-break: break-all;background-color:#ff0000"><?php echo $mostrar['exiration']; ?></td>    
    <?php } ?>   
      
    <td  id="especel">
        <div class="containerG2r" style="background:rgba(255, 255, 255, 0)">
        <div class="item"><center>
        <form id="frm" method="post" action="../vista/DispositivoD1.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDd'];?>">
        <input id="input2" type="submit" value="Historial">      
        </form>
        </center></div>
        <div class="item"><center>
        <form id="frm" target="_blank"  method="post" action="../vista/reportes.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDd'];?>">
        <input id="inputU" type="submit" value="Reporte">      
        </form>  
        </center></div>
        </div>
    </td>
  </tr>
    
    <?php 
}?>
</table>
</div>  
       
</center>

</section>
</section>
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