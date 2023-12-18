<div class="table-wrapper-scroll-y my-custom-scrollbar">
<?php 
date_default_timezone_set("America/Mexico_City");
$fecha_actual = date("Y-m-d");
?>
<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    <th scope="col" style="width:2%">Habitación</th>
    <th scope="col" style="width:3%">Hoy</th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 1 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 2 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 3 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 4 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 5 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 6 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 7 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 8 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 9 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 10 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 11 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 12 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 13 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 14 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 15 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 16 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 17 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 18 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 19 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 20 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 21 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 22 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 23 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 24 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 25 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 26 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 27 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 28 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 29 day")); ?></th>
    <th scope="col" style="width:3%"><?php echo $subfecha = date("d/m",strtotime($fecha_actual."+ 30 day")); ?></th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['numero'])){$_POST['numero']='';}
if(empty($_POST['estado'])){$_POST['estado']='';}
if(empty($_POST['categoria'])){$_POST['categoria']='';}
$sql="Select r.IDr,r.status, r.sort, r.fechasalida, c.Rsort from rooms as r inner join rcategories as c where r.sort=IDrc and r.IDr like '%".$_POST["numero"]."%' and c.Rsort like '%".$_POST["categoria"]."%' and r.status like '%".$_POST["estado"]."%' and r.sort!='7' and r.sort!='8' and r.sort!='9' order by r.IDr";
if($_POST['categoria']=='Doble'){
$sql="Select r.IDr,r.status, r.sort, c.Rsort from rooms as r inner join rcategories as c where r.sort=IDrc and r.IDr like '%".$_POST["numero"]."%' and c.Rsort='".$_POST["categoria"]."' and r.status like '%".$_POST["estado"]."%' and r.sort!='7' and r.sort!='8' and r.sort!='9' order by r.IDr";}
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    <td scope="row" style="word-break: break-all;background-color:rgba(16, 56, 47, 0.79);color:white"><?php echo $mostrar['IDr']; ?></td>

      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 1 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 2 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 3 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 4 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 5 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 6 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 7 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 8 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 9 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 10 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 11 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 12 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 13 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 14 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 15 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 16 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 17 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 18 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 19 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 20 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 21 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 22 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 23 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 24 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 25 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 26 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 27 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 28 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 29 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
      <?php if($mostrar['fechasalida']>=date("Y-m-d",strtotime($fecha_actual."+ 30 day"))){?>
    <td  style="word-break: break-all;background-color:#2f67ff"></td>
    <?php }else{?>
    <td  style="word-break: break-all;background-color:rgba(255,255,255, 0.75)"></td>
    <?php }?>
      
    

  </tr>
    
    <?php 
}?>
</table>
</div>