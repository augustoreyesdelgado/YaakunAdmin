<div class="table-wrapper-scroll-y my-custom-scrollbar">

<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    
    <th scope="col" style="width:2%">Fecha de mantenimiento</th>
    <th scope="col" style="width:1.5%">Costo</th>
    <th scope="col" style="width:2.5%">Comentario</th>
    <th scope="col" style="width:2.5%">firma</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['modelo'])){$_POST['modelo']='';}
if(empty($_POST['marca'])){$_POST['marca']='';}
if(empty($_POST['categoria'])){$_POST['categoria']='';}
$sql="Select d.IDd,d.Dmodel,b.name as Brand,c.name as Category,d.Idate,m.Cost,m.Lmaint,m.Comment,m.firm from devices as d inner join dicategories as c inner join brands as b inner join maintenance as m where d.Brand=b.IDb and d.Category=c.IDc and d.IDd=m.IDdiv and d.Dmodel like '%".$_POST["modelo"]."%' and c.name like '%".$_POST["categoria"]."%' and b.name like '%".$_POST["marca"]."%' and d.IDd='".$_POST["IDss"]."' order by m.Lmaint desc";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Lmaint']; ?></td>
    <td  style="word-break: break-all;background-color:white">$<?php echo $mostrar['Cost']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Comment']; ?></td>
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['firm']; ?></td>
</tr>
    
    <?php 
}?>
</table>
</div>