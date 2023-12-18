<div class="table-wrapper-scroll-y my-custom-scrollbar">

<table id="tablaT" border="1" class="table table-bordered table-striped mb-0">
    <tr>
    
    <th scope="col" style="width:2%">Fecha de falla</th>
    <th scope="col" style="width:1.5%">Costo</th>
    <th scope="col" style="width:2.5%">Comentario</th>
        
  </tr>
    
   
<?php
$conexion=mysqli_connect("localhost","root","","yaakun");
if(empty($_POST['modelo'])){$_POST['modelo']='';}
if(empty($_POST['marca'])){$_POST['marca']='';}
if(empty($_POST['categoria'])){$_POST['categoria']='';}
$sql="Select d.IDd,d.Dmodel,b.name as Brand,c.name as Category,d.Idate,f.Cost,f.Lfail from devices as d inner join dicategories as c inner join brands as b inner join fails as f where d.Brand=b.IDb and d.Category=c.IDc and d.IDd=f.IDD and d.Dmodel like '%".$_POST["modelo"]."%' and c.name like '%".$_POST["categoria"]."%' and b.name like '%".$_POST["marca"]."%' and d.IDd='".$_POST["IDss"]."' order by f.Lfail desc";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
  
  <tr>
    
    <td  style="word-break: break-all;background-color:white"><?php echo $mostrar['Lfail']; ?></td>
    <td  style="word-break: break-all;background-color:white">$<?php echo $mostrar['Cost']; ?></td>
    <td  style="word-break: break-all;background-color:white"></td>
  </tr>
    
    <?php 
}?>
</table>
</div>