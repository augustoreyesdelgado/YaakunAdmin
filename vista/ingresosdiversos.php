<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
date_default_timezone_set("America/Mexico_City");
$object_usuario=new usuario();
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuD.html");
error_reporting(0);
if($_POST["IDss"]!=null){
$_SESSION["IDss"]=$_POST["IDss"];}
$array=$object_usuario->obtener_datos($_SESSION["IDss"]);

//include_once("../controlador/variables.php")
//$arrayq1=$object_usuario->evaluar1E($_POST["correo"]);
//$_SESSION["nombre"]=$array['nombre']."";
?>

<center>
<section style="height:70%;padding-top:0.1%">
    
<section style="width: 50%;height:100%;margin-left:0.5%">
        <br>
<center>


<div style="background-color:rgba(255, 255, 255, 0.88);font-weight: bold;font-family:helvetica">
<br><br>
    
<div class="containerlista">

<label>Ingreso de Diversos</label>    
    
<br><br>    
<table style="width:80%">
    <form>
    <tr >
        <th colspan="5"></th> 
        <th scope="col" style="float:right">Fecha:<input type="datetime" name="fecha"  value="<?php echo date("Y-m-d");?>"></th> 
    </tr>
            
            <tr>
                
            <td>Tipo de Cliente</td><td colspan="2">
                
            <select id="Tipocliente">
                
            <option value=""></option>
            <option value="1">Venta</option>
            <option value="2">Mantenimiento</option>
            </select>
                
            </td>
            
            <td>Cantidad</td><td colspan="2"><input type="number" name="Name" id="Name"  autocomplete="on" required></td>  
            
            </tr>
            
            <tr>
                
            <td>Precio Unitario</td><td colspan="2"><input type="number" id="sit3" name="Name" id="Name"  autocomplete="on" required></td>
                
            <td>Total de Ingreso</td><td colspan="2"><input type="number" id="sit3" name="Name" id="Name"  autocomplete="on" required></td>    
                
            </tr>
        
            <tr>
                
            <td>Forma de Pago:</td><td><select id="formapago">
                
            <option value=""></option>
            <option value="1">EFECTIVO</option>
            <option value="2">CREDITO</option>
            <option value="3">TARJETA</option>
            <option value="4">CHEQUE</option>
            <option value="5">TRANSFERENCIA</option>
            <option value="6">DEPOSITO</option>
            <option value="7">PAGO ANTICIPADO</option>
            <option value="8">CARGO</option>
            </select>
            </td>
                
            <td>Estado de Pago:</td><td><select id="estadopago">
                
            <option value=""></option>
            <option value="1">Pagado</option>
            <option value="2">Pendiente</option>
            </select>
            </td>
                
            <td>Factura?:</td><td><select id="factura">
                
            <option value=""></option>
            <option value="1">Si</option>
            <option value="2">No</option>
            </select>
            </td>
            </tr>
        
</table>  
<br><br>
<table style="width:80%">
    <tr><th>Observaciones:</th></tr>
    <tr><th><textarea rows="10" cols="80" name="Comment" id="Comment" required=""></textarea></th></tr>
    <tr><th><input type="submit" id="sit3" value="Guardar"></form></th></tr>
</table> 
    
</div>
    
    
    
</div>
       
</center>

</section>
    
</center>

<br><br>

<script src="../js/funciones.js"></script>

<script>
    
    function myFunction() {
        var x = document.getElementById("mySelect").value;
    
         if(x==1){
            document.getElementById("demo").innerHTML = '<select id="room" name="room"><option value="201">201</option><option value="202">202</option><option value="301">201</option><option value="307">307</option><option value="308">308</option><option value="309">309</option><option value="401">401</option><option value="407">407</option><option value="408">408</option><option value="409">409</option></select>';
        }
        if(x==2){
            document.getElementById("demo").innerHTML = '<select id="room" name="room">            <option value="101">101</option>            <option value="102">102</option>            <option value="103">103</option>            <option value="104">104</option>            <option value="105">105</option>            <option value="106">106</option>            <option value="107">107</option>            <option value="108">108</option>            <option value="109">109</option>            <option value="110">110</option>            <option value="111">111</option>            <option value="112">112</option>            <option value="204">204</option>            <option value="205">205</option>            <option value="206">206</option>            <option value="207">207</option>            <option value="302">302</option>            <option value="303">303</option>            <option value="304">304</option>            <option value="305">305</option>            <option value="310">310</option>            <option value="402">402</option>            <option value="403">402</option>            <option value="404">404</option>            <option value="405">405</option>            <option value="410">410</option>            <option value="412">412</option>            <option value="413">413</option>            <option value="414">414</option>            <option value="415">415</option>            <option value="416">416</option>            <option value="417">417</option></select>';
        }
        if(x==3){
            document.getElementById("demo").innerHTML = '<select id="room" name="room"><option value="203">203</option><option value="306">306</option><option value="406">406</option></select>';
        }
        if(x==4){
            document.getElementById("demo").innerHTML = '<select id="room" name="room"><option value="411">411</option>></select>';
        }
    
    }
</script>

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