<?php

include_once("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
?>

<table border="1">
<th>
<table border="1">
        
        <tr>
        <th style="float:center" colspan="3">
        Estado
        </th>
        </tr>
    
        <tr>
        <th>
        Bueno
        </th>
        <th>
        Regular
        </th>
        <th>
        Malo
        </th>
        </tr>
            
        <tr>
        <th>
        <input type="radio" name="qes" onchange="">
        </th>
         <th>
        <input type="radio" name="qes" onchange="observacionesA()">
        </th>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        </tr>
    
</table>
</th>
<th>
<div class="table-wrapper-scroll-y my-custom-scrollbarb">
<table style="width:300px">
        
        <tr>
        <th style="float:center" colspan="3">
        Observaciones
        </th>
        </tr>
    
        <tr>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        
        <th>
        Bueno
        </th>    
        </tr>
    
        <tr>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        
        <th>
        Bueno
        </th>    
        </tr>
    
        <tr>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        
        <th>
        Bueno
        </th>    
        </tr>
    
        <tr>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        
        <th>
        Bueno
        </th>    
        </tr>
        
        <tr>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        
        <th>
        Bueno
        </th>    
        </tr>
    
        <tr>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        
        <th>
        Bueno
        </th>    
        </tr>
    
        <tr>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        
        <th>
        Bueno
        </th>    
        </tr>
    
        <tr>
        <th>
        <input type="radio" name="qes" onchange="observacioesB()">
        </th>
        
        <th>
        Bueno
        </th>    
        </tr>
    
</table>
</div>
</th>    
</table>
    
<script>
    function Detector(){
    document.getElementById("especial1").innerHTML = '<td><table border="1"></table></td><td><table border="1"></table></td>';
    document.getElementById("especial2").innerHTML = '';
    }
    function Perchero(){
    document.getElementById("especial1").innerHTML = '';
    document.getElementById("especial2").innerHTML = '<?php echo $_SESSION['B']; ?> a';
    }
    Function ClearA(){
    document.getElementById("especial1b").innerHTML = '';
    }
</script>