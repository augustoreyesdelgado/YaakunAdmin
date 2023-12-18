<div class="table-wrapper-scroll-y my-custom-scrollbar600">
<?php 
date_default_timezone_set("America/Mexico_City");
$fecha_actual = date("Y-m-d");
?>
<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    <th scope="col" style="width:2%">Nombre</th>
    <th scope="col" style="width:3%">Asistencia</th>
    <th scope="col" style="width:3%">Puesto</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['numero'])){$_POST['numero']='';}
if(empty($_POST['estado'])){$_POST['estado']='';}
if(empty($_POST['categoria'])){$_POST['categoria']='';}
$sql="SELECT ID,name,estado FROM empleados where estado=1 order by name";
    
    
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    <td scope="row" style="word-break: break-all;background-color:rgba(16, 56, 47, 0.79);color:white"><?php echo $mostrar['name']; ?></td>

    <?php 
                                            
    $sql2="SELECT Puntero,Puesto FROM asistencia where IDemp='".$mostrar['ID']."' and fecha='".$fecha_actual."'";  
    $result2=mysqli_query($conexion,$sql2);
    $mostrar2=mysqli_fetch_array($result2);
                                            
    if(!empty($mostrar2)){?>
    <td  style="word-break: break-all;background-color:#2fff3f">Presente</td>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"><?php echo $mostrar2['Puesto']; ?></td>
    <?php }
    else{?>
    <td  style="word-break: break-all;background-color:rgba(113, 113, 113, 0.75)">Sin asistencia</td>
    <td  style="word-break: break-all;background-color:rgba(113, 113, 113, 0.75)"></td>
    <?php }?>

  </tr>
    
    <?php 
}
?>
</table>
</div>