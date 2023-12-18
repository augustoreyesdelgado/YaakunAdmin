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

//include_once("../controlador/variables.php")
//$arrayq1=$object_usuario->evaluar1E($_POST["correo"]);
//$_SESSION["nombre"]=$array['nombre']."";
?>

<section style="height:70%;padding-top:0.1%">
    
<section style="width: 99%;margin-left:0.5%">
        <br>
    
        <div class="containerGm">
        
        <div class="item" style="padding-top:5%">
        <form  action="../vista/selecciondehabitaciones.php">
        <center><input id="input2" type="submit" value="Volver a selecci&oacute;n"></center>  
        </form>
        </div>    
            
        <div class="item" style="padding:5.5%">
        <label style="color:white">Numero de habitaci&oacute;n: </label><label><?php echo $array['IDr']?></label>
        </div>
        
        <div class="item" style="padding:5.5%">
        <label style="color:white">Categor&iacute;a: </label><label><?php echo $array['Rsort']?></label>
        </div>
            
        </div>  
<center>

<div class="containerG2r">
<div class="table-wrapper-scroll-y my-custom-scrollbar">

<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    <th scope="col" style="width:0.5%"></th>
    <th scope="col" style="width:2%">Modelo</th>
    <th scope="col" style="width:1%">Categoria</th> 
    <th scope="col" style="width:0.5%">Proximo Mantenimiento</th>
    <th scope="col" style="width:0.5%">Estado</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['modelo'])){$_POST['modelo']='';}
if(empty($_POST['marca'])){$_POST['marca']='';}
if(empty($_POST['categoria'])){$_POST['categoria']='';}
$sql="Select d.IDd,d.Dmodel,b.name as Brand,c.name as Category,d.Idate,d.Bcost,d.room,m.Lmaint,d.Nmaintenance,m.status from devices as d inner join dicategories as c inner join brands as b inner join maintenance as m where d.Brand=b.IDb and d.Category=c.IDc and d.IDd=m.IDdiv and d.Dmodel like '%".$_POST["modelo"]."%' and c.name like '%".$_POST["categoria"]."%' and b.name like '%".$_POST["marca"]."%' and d.room='".$array['IDr']."' and m.apuntador!=0 order by Category";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    
    <form id="frm" method="post" action="../controlador/reporteMI.php">
    <td  style="word-break: break-all;background-color:white"><input type="radio" id="IDD" name="IDD" value="<?php echo $mostrar['IDd']; ?>" required=""></td>
    <td  id="especel3"><?php echo $mostrar['Dmodel']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Category']; ?></td>
    
    
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

  </tr>
    
    <?php 
}?>
</table>
    
</div>
<div style="background-color:rgba(0, 0, 0, 0.67);font-weight: bold;font-family:helvetica">
<br><br>
<div id="extra1" style="color:white">
<table>        
  <tbody>
    <tr><th style="float:left">Fecha de revisi&oacute;n:</th><th><input type="date" id="sit3" name="Idate" required=""></th></tr>
    <tr><th style="float:left">Proxima de revisi&oacute;n:</th><th><input type="date" id="sit3" name="Bdate" required=""></th></tr>
    <tr><th style="float:left">Costo:</th><th><input type="number" id="sit3" name="Bcost" placeholder="1000.00" autocomplete="on" required=""></th></tr>
    <tr><td><center>Bueno</center></td><td><center>Regular</center></td><td><center>Malo</center></td></tr>
    <tr><td><input type="radio" value="1" name="estado" id="estado" required=""></td>  <td><input type="radio" value="2" name="estado" id="estado"></td><td><input type="radio" value="3" name="estado" id="estado"></td></tr>
    <tr><th style="float:left">Observaciones:</th><th><textarea rows="10" cols="40" name="Comment" id="Comment" required=""></textarea></th></tr>
    <tr><th style="float:left">Firma: </th><th><input type="text" id="sit3" name="firm" placeholder="Administrador" autocomplete="on" required=""></th></tr>
  </tbody>
</table>
  <br>
  <input type="submit" id="sit3" value="Guardar"></form></div>
</div>
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