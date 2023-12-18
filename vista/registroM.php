<?php
include("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
?><br><br>

        <center><div class= "cont" style="color:white;font-family: helvetica;background-color:rgba(0, 0, 0, 0.67)">
        <cente>Reportar mantenimiento</cente>
        <br>
        <br>
        <form id="frm" method="post" action="../controlador/reporteM.php">
            
        <table>
        
        <tr>
        <th style="float:left">
        Fecha:
        </th>
        <th>
        <input type="date" id="sit3" name="Idate" id="Idate" required>
        </th>
        </tr>
        <tr>
        <th style="float:left">
        Costo:
        </th>
        <th>
        <input type="number" id="sit3" name="Bcost" id="Bcost" placeholder="1000.00" autocomplete="on" required>
        </th>
        </tr>
            
        <tr>
        <th style="float:left">
        Comentario
        </th>
        <th>
        <input type="text" id="sit3" name="Comment" id="Comment" placeholder="Todo en orden" autocomplete="on" required>
        </th>
        </tr>
        
        </table>
            
        <input id="IDD" name="IDD" type="hidden" value="<?php echo $_POST["IDss"];?>">
            
        <br>
        <input type="submit" id="sit3" value="Registrar"></form>
		</div><a href="inicioE.php"><button type="submit">Cancelar</button></a>
</center><br>

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
