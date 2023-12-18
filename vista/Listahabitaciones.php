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
        <center><b style="font-family:Helvetica;color:white">Buscar Habitación</b>
            <br>
            <form action="<?php $_PHP_SELF ?>" method="POST">

            <label style="color:white">Numero:</label> <input id="numero" type="number" name="numero" />

            <input name="submit" type="submit" value="Buscar">
            </form>
        </center>
        </div>
        
        <div class="item" style="padding-top:2%;padding-bottom:1%;padding-left:20%">
            <div style="float:left">
            <b style="font-family:Helvetica;color:white">Filtros de busqueda</b>
            <br>
            <form action="<?php $_PHP_SELF ?>" method="POST">
            <label style="color:white">Categoria:</label> 
                
            <label><select name="categoria" name="categoria" style="width:50%">
                
            <?php
            include("../modelo/conexion.php");
            $consulta="SELECT Rsort FROM rcategories where IDrc<6";
            $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
                ?>
                <option value=""></option>
                <?php foreach ($ejecutar as $opciones):?>
                <option value="<?php echo $opciones['Rsort']?>" autocomplete="on"><?php echo $opciones['Rsort']?></option>
                <?php endforeach ?>
            
            </select></label>
            <br>
            <label style="color:white">Estado:</label>
                
            <label><select name="estado" name="estado" style="width:48%">
                <option value=""></option>
                <option value="1" autocomplete="on">Libre</option>
                <option value="2" autocomplete="on">Ocupada</option>
            
            </select></label>
                
            <br>
            <input name="submit" type="submit" value="Buscar">
            </form>
            </div>
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
    <th scope="col" style="width:0.5%">Numero</th>
    <th scope="col" style="width:5%">Categoria</th>
    <th scope="col" style="width:5%">Estado</th>
    <th scope="col" style="width:1.5%">Alertas de Mantenimiento</th>
    <th scope="col" style="width:3%">Alertas de Daño</th>
    <th scope="col" style="width:4%">Acciones</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['numero'])){$_POST['numero']='';}
if(empty($_POST['estado'])){$_POST['estado']='';}
if(empty($_POST['categoria'])){$_POST['categoria']='';}
$sql="Select r.IDr,r.status, r.sort, c.Rsort from rooms as r inner join rcategories as c where r.sort=IDrc and r.IDr like '%".$_POST["numero"]."%' and c.Rsort like '%".$_POST["categoria"]."%' and r.status like '%".$_POST["estado"]."%' and r.sort!='7' and r.sort!='8' and r.sort!='9' order by r.IDr";
if($_POST['categoria']=='Doble'){
$sql="Select r.IDr,r.status, r.sort, c.Rsort from rooms as r inner join rcategories as c where r.sort=IDrc and r.IDr like '%".$_POST["numero"]."%' and c.Rsort='".$_POST["categoria"]."' and r.status like '%".$_POST["estado"]."%' and r.sort!='7' and r.sort!='8' and r.sort!='9' order by r.IDr";}
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
    <?php } else if($mostrar['Rsort']=='Sarita'){?>
    <td  id="especel3D"><?php echo $mostrar['Rsort']; ?></td>
    <?php }?>  
    <?php if($mostrar['status']==1){?>
    <td  style="word-break: break-all;background-color:rgba(10, 255, 0, 0.75)">Libre</td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:#2f67ff">En uso</td>
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
        <center>
        <div class="containerG4b" style="background:rgba(255, 255, 255, 0)">
            
        <div class="item" style="margin:2%"><center>
        <form id="frm" method="post" action="../vista/habitacion.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDr'];?>">
        <input id="input2" type="submit" value="Dispo. & muebles">      
        </form>
        </center></div>
        
        <div class="item" style="margin:2%"><center>
        <form id="frm" method="post" action="../controlador/estadodeuso.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDr'];?>">
        <input id="inputL" name="est" type="submit" value="Liberar">      
        </form>  
        </center></div>
            
        <div class="item" style="margin:2%"><center>
        <form id="frm" method="post" action="../vista/habitaciond.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDr'];?>">
        <input id="input2" type="submit" value="Ob. Desechables">      
        </form>
        </center></div>
            
        <div class="item" style="margin:2%"><center>
        <form id="frm" method="post" action="../controlador/estadodeuso.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDr'];?>">
        <input id="inputU" name="est" type="submit" value="En uso">      
        </form>
        </center></div>
        </div>
            
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