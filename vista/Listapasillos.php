<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuE.html");
error_reporting(0);
?>

<section style="height:70%;padding-top:0.1%">
    
<section style="width: 99%;margin-left:0.5%">
        <br>
    
        <div class="containerGm">
        
        <div class="item" style="padding:5.5%">
        <center><b style="font-family:Helvetica;color:white">Buscar Pasillo</b>
            <br>
            <form action="<?php $_PHP_SELF ?>" method="POST">

            <label style="color:white">Nombre:</label> <input id="nombre" type="text" name="nombre" />

            <input name="submit" type="submit" value="Buscar">
            </form>
        </center>
        </div>
        
        <div class="item" style="padding-top:2%;padding-bottom:1%;padding-left:20%">
        </div>
        
        <div class="item" style="padding-top:5%">
        <div class="containerGm">
        <div class="item"></div>
        <div class="item" style="padding-top:8%"><center><button>Imprimir Tabla</button></center></div>
        <div class="item"></div>
        </div>
        </div>
        </div>  
<center>

<div class="table-wrapper-scroll-y my-custom-scrollbarA">

<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    <th scope="col" style="width:5%">Nombre</th>
    <th scope="col" style="width:1.5%">Alertas de Mantenimiento</th>
    <th scope="col" style="width:3%">Alertas de Daño</th>
    <th scope="col" style="width:4%">Acciones</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['nombre'])){$_POST['nombre']='';}
$sql="Select r.IDr,r.status, r.sort,r.rname, c.Rsort from rooms as r inner join rcategories as c where r.sort=IDrc and r.rname like '%".$_POST["nombre"]."%' and c.Rsort like '%".$_POST["categoria"]."%' and r.status like '%".$_POST["estado"]."%' and r.sort='7' order by r.rname";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    <td scope="row" style="word-break: break-all;background-color:rgba(186, 64, 10, 0.76);color:white"><?php echo $mostrar['rname']; ?></td>
    
      
    <?php 
    $sqlb="SELECT Nmaintenance FROM `devices` WHERE room='".$mostrar['IDr']."' ORDER by Nmaintenance LIMIT 1";
    $result2=mysqli_query($conexion,$sqlb);
    $fecha_actual = strtotime(date("d-m-Y"));
    $mostrar2=mysqli_fetch_array($result2);
    $fecha_entrada = strtotime($mostrar2['Nmaintenance']);
    if($fecha_actual >= $fecha_entrada && !empty($mostrar2['Nmaintenance'])){?>
    <td style="word-break: break-all;background-color:#ddd51c">Requiere atención</td>
    <?php } else{?>
    <td style="word-break: break-all;background-color:white"></td>
    <?php } ?>
      
    <?php 
    $sqlc="SELECT d.IDd, d.room from devices as d inner join maintenance as m on d.IDd=m.IDdiv WHERE m.apuntador='1' and d.room='".$mostrar['IDr']."' and m.status!='1'";
    $result3=mysqli_query($conexion,$sqlc);
    $mostrar3=mysqli_fetch_array($result3);
    if(!empty($mostrar3)){?>
    <td style="word-break: break-all;background-color:#ddd51c">Requiere atención</td>
    <?php } else{?>
    <td style="word-break: break-all;background-color:white"></td>
    <?php } ?>

    <td  id="especel">
        <center>
        
        <form id="frm" method="post" action="../vista/habitacion.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDr'];?>">
        <input id="input2" type="submit" value="Dispo. & muebles">      
        </form><br>
        <center>
        <form id="frm" method="post" action="../vista/habitacion.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDr'];?>">
        <input id="input2" type="submit" value="Ob. Desechables">      
        </form>
        </center>
            
        </center>
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