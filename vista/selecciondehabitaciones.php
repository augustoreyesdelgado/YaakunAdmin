<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
error_reporting(0);
include_once("menuE.html");
?>

<section style="height:70%;padding-top:0.1%">
    
<section style="width: 99%;margin-left:0.5%">
        <br> 
<center>

<div class="table-wrapper-scroll-y my-custom-scrollbarA">

<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    <th scope="col" style="width:0.5%">Numero</th>
    <th scope="col" style="width:5%">Categoria</th>
    <th scope="col" style="width:1.5%">Alertas de Mantenimiento</th>
    <th scope="col" style="width:3%">Alertas de Daño</th>
    <th scope="col" style="width:5%">Acciones</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['numero'])){$_POST['numero']='';}
if(empty($_POST['estado'])){$_POST['estado']='';}
if(empty($_POST['categoria'])){$_POST['categoria']='';}
$sql="Select r.IDr,r.status, r.sort,r.rname, c.Rsort from rooms as r inner join rcategories as c where r.sort=IDrc and r.IDr like '%".$_POST["numero"]."%' and c.Rsort like '%".$_POST["categoria"]."%' and r.status like '%".$_POST["estado"]."%' order by r.IDr";
if($_POST['categoria']=='Doble'){
$sql="Select r.IDr,r.status, r.sort,r.rname, c.Rsort from rooms as r inner join rcategories as c where r.sort=IDrc and r.IDr like '%".$_POST["numero"]."%' and c.Rsort='".$_POST["categoria"]."' and r.status like '%".$_POST["estado"]."%' order by r.IDr";}
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    <td scope="row" style="word-break: break-all;background-color:rgba(186, 64, 10, 0.76);color:white"><?php echo $mostrar['IDr']; ?></td>
    
    <?php if($mostrar['Rsort']=='Doble') {?>
    <td  id="especel3A"><?php echo $mostrar['Rsort']; ?></td>
    <?php } else if($mostrar['Rsort']=='Doble Limitada'){?>
    <td  id="especel3AD"><?php echo $mostrar['Rsort']; ?></td>
    <?php } else if($mostrar['Rsort']=='Clasica'){?>
    <td  id="especel3R"><?php echo $mostrar['Rsort']; ?></td>
    <?php } else if($mostrar['Rsort']=='Junior'){?>
    <td  id="especel3M"><?php echo $mostrar['Rsort']; ?></td>
    <?php } else if($mostrar['Rsort']=='Master'){?>
    <td  id="especel3D"><?php echo $mostrar['Rsort']; ?></td>
    <?php } else if($mostrar['sort']>5){?>
    <td  id="especelcom"><?php echo $mostrar['rname']; ?></td>
    <?php }?>
      
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
        <div class="item"><center>
        <form id="frm" method="post" action="../vista/habitacionvs.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDr'];?>">
        <input id="input2" type="submit" value="Supervisar">      
        </form>
        </center>
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