<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
include_once("menuE.html");

?>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/plotly-latest.min.js"></script>
<section style="height:65%;padding-top:0.1%">
<section style="width: 99%;margin-left:0.5%">
        <br>
    
        <div class="containerGm">
        
        <div class="item" style="padding:5.5%">
        <form id="frm" method="post" action="../vista/Listadispositivos.php">
        <input id="IDss" name="IDss" type="hidden" value="<?php echo $array["room"];?>">
        <input id="input2" type="submit" value="Volver a Lista">      
        </form>  
        </div>
        
        <div class="item" style="padding:0.5%">
        </div>
        
        <div class="item" style="padding-top:5%">
        <div class="containerGm">
        <div class="item"></div>
        <div class="item"><center><button>Imprimir Tabla</button></center></div>
        <div class="item"></div>
        </div>
        </div>
        </div>  
    
        <div class="containerF">
        <div class="item" style="padding:2%">
            
        <?php include_once("tablamarcas.php"); ?>
            
        </div>
        <div class="item" style="padding:2%"><?php include_once("barrasN.php"); ?></div>
        <!--<div class="item" style="padding:2%">
            
        <//?php include_once("tablafallas.php"); ?>
        
        </div>
        <div class="item" style="padding:2%"><//?php include_once("barrasC.php"); ?></div>-->
        </div>
    
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