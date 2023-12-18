<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
date_default_timezone_set("America/Mexico_City");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuE.html");
?>

<section style="height:70%;padding-top:0.1%">
    
<section style="width: 99%;margin-left:0.5%">
        <br>
    
        <div class="containerGm">
        
        <div class="item" style="padding:5.5%">
        <center><b style="font-family:Helvetica;color:white">Busqueda de Dispositivo</b>
            <br>
            <form action="<?php $_PHP_SELF ?>" method="POST">

            <label style="color:white">Nombre o Modelo:</label> <input id="modelo" type="text" name="modelo" />

            <input name="submit" type="submit" value="Buscar">
            </form>
        </center>
        </div>
        
        <div class="item" >
            <div style="float:left">
            <div style="margin:2%">
            <center><b style="font-family:Helvetica;color:white">Filtros de busqueda</b></center>
            </div>
            <form action="<?php $_PHP_SELF ?>" method="POST">
            <div class="container4x">
             
            <div class="item" >
            <label style="color:white">Marca:</label> 
                
            <label><select name="marca" name="marca" style="width:50%">
                
            <?php
            include("../modelo/conexion.php");
            $consulta="SELECT name FROM brands";
            $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
                ?>
                <option value=""></option>
                <?php foreach ($ejecutar as $opciones):?>
                <option value="<?php echo $opciones['name']?>" autocomplete="on"><?php echo $opciones['name']?></option>
                <?php endforeach ?>
            
            </select></label>
            
            </div>    
            
            <div class="item" >
            <label style="color:white">Categoria:</label>
                
            <label ><select name="categoria" name="categoria" style="width:50%">
                
            <?php
            include("../modelo/conexion.php");
            $consulta="SELECT name FROM dicategories";
            $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
                ?>
                <option value=""></option>
                <?php foreach ($ejecutar as $opciones):?>
                <option value="<?php echo $opciones['name']?>" autocomplete="on"><?php echo $opciones['name']?></option>
                <?php endforeach ?>
            
            </select></label>
            </div>
                
            <div class="item" >
            <label style="color:white">Estado:</label>
                
            <label>
            <select name="estado" name="estado" style="width:49%">
               
            <option value=""></option>
            <option value="1" autocomplete="on">Bueno</option>
            <option value="2" autocomplete="on">Regular</option>
            <option value="3" autocomplete="on">Malo</option>


            
            </select>
            </label>
            </div>
            <div class="item" >
            <center><input name="submit" type="submit" value="Buscar"></center>
            </div>
            
                
            </div>
            </form> 
            </div>
        </div>
        
        <div class="item" style="padding-top:5%">
        <div class="containerGm">
        <div class="item"><center><a href="registros.php"><img style="width: 50%;border-radius:4px;centered" onmouseout="this.src='img/dispositivosA.png'" onmouseover="this.src='img/dispositivos.png'" src="img/dispositivosA.png"></a></center></div>
        <div class="item"><center><a href="inspector.php"><img style="width: 50%;border-radius:4px;centered" onmouseout="this.src='img/graficas.png'" onmouseover="this.src='img/graficasA.png'" src="img/graficas.png"></a></center></div>
        <div class="item" style="padding-top:8%"><center><button>Imprimir Tabla</button></center></div>
        </div>
        </div>
        </div>  
<center>

<div class="table-wrapper-scroll-y my-custom-scrollbar">

<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    <th scope="col" style="width:0.5%">ID</th>
    <th scope="col" style="width:7%">Modelo</th>
    <th scope="col" style="width:3%">Marca</th>
    <th scope="col" style="width:2%">Categoria</th>
    <th scope="col" style="width:2%">Fecha de Compra</th>
    <th scope="col" style="width:2%">Costo ($MXM)</th>
    <th scope="col" style="width:1%">Habitaci&oacute;n</th>    
    <th scope="col" style="width:1.5%">Ultimo mantenimiento</th>
    <th scope="col" style="width:1.5%">Proximo Mantenimiento</th>
    <th scope="col" style="width:0.5%">Estado</th>
    <th scope="col" style="width:1%">Acciones</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['modelo'])){$_POST['modelo']='';}
if(empty($_POST['marca'])){$_POST['marca']='';}
if(empty($_POST['categoria'])){$_POST['categoria']='';}
if(empty($_POST['estado'])){$_POST['estado']='';}
$sql="Select d.IDd,d.Dmodel,b.name as Brand,c.name as Category,d.Idate,d.Bcost,d.room,m.Lmaint, m.status,d.Nmaintenance from devices as d inner join dicategories as c inner join brands as b inner join maintenance as m where d.Brand=b.IDb and d.Category=c.IDc and d.IDd=m.IDdiv and d.Dmodel like '%".$_POST["modelo"]."%' and c.name like '%".$_POST["categoria"]."%' and b.name like '%".$_POST["marca"]."%' and m.status like '%".$_POST['estado']."%' and m.apuntador!=0 order by d.IDd";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    <td scope="row" style="word-break: break-all;background-color:blue;color:white"><?php echo $mostrar['IDd']; ?></td>
    <td  id="especel3"><?php echo $mostrar['Dmodel']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Brand']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Category']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Idate']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Bcost']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['room']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Lmaint']; ?></td>
    
    <?php 
      $fecha_actual = strtotime(date("d-m-Y"));
      $fecha_entrada = strtotime($mostrar['Nmaintenance']);
      if($fecha_actual < $fecha_entrada){?>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Nmaintenance']; ?></td>
    <?php } else if ($fecha_actual == $fecha_entrada){ ?>
    <td  style="word-break: break-all;background-color:#ddd51c"><?php echo $mostrar['Nmaintenance']; ?></td>  
    <?php } else { ?>
    <td  style="word-break: break-all;background-color:#ff0000"><?php echo $mostrar['Nmaintenance']; ?></td>    
    <?php } ?>
      
    <?php
    if($mostrar['status']==1){?>
    <td  style="word-break: break-all;background-color:#3ff427"><center>B</center></td>
    <?php } else if ($mostrar['status']==2){ ?>
    <td  style="word-break: break-all;background-color:#ddd51c"><center>R</center></td>  
    <?php } else if ($mostrar['status']==3){ ?>
    <td  style="word-break: break-all;background-color:#ff0000"><center>M</center></td>    
    <?php } ?>
    
      
    <td  id="especel">
        <div class="containerG2r" style="background:rgba(255, 255, 255, 0)">
        <div class="item"><center>
        <form id="frm" method="post" action="../vista/DispositivoD2.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $mostrar['IDd'];?>">
        <input id="input2" type="submit" value="Historial">      
        </form>
        </center></div>
        <div class="item"><center>
        <form id="frm" target="_blank"  method="post" action="../vista/reportesL.php">
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