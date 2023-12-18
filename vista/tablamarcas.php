<div class="table-wrapper-scroll-y my-custom-scrollbar">

<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    
    <th scope="col" style="width:2%">Marca</th>
    <th scope="col" style="width:2.5%">Reportes</th>
    <th scope="col" style="width:1.5%">Costo total ($MXM)</th>
    <th scope="col" style="width:1.5%">Costo promedio ($MXM)</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
$sql="SELECT m.Lmaint,sum(m.COST) as COST, SUM(M.puntero) AS puntero,d.Brand from maintenance as m inner join devices as d on m.IDdiv=d.IDd GROUP by BRAND order by brand";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    <?php 
          $sqlaux="SELECT COUNT(IDd) as suma, b.name FROM `devices` as d INNER JOIN Brands as b on d.Brand=b.IDb WHERE Brand='".$mostrar['Brand']."'";
          $result2=mysqli_query($conexion,$sqlaux);
          $mostrar2=mysqli_fetch_array($result2);
          $aux3=0;
          $aux2=$mostrar['puntero']-$mostrar2['suma'];
          if($mostrar['COST']>0){                                  
          $aux=$mostrar['COST']; 
          $aux3=$aux/$aux2;} ?>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar2['name']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $aux2; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['COST']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $aux3; ?></td>
</tr>
    
    <?php 
}?>
</table>
</div>