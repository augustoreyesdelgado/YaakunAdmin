<?php
include("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
?><br><br>

        <center><div class= "cont" style="color:white;font-family: helvetica;background-color:rgba(0, 0, 0, 0.67)">
        <cente>Registrar Nuevo Dispositivo</cente>
        <br>
        <br>
        <form id="frm" method="post" action="../controlador/registroDis.php">
            
        <table>
        <tr>
        <th style="float:left">
         Modelo:
        </th>
        <th>
        <input type="text" id="sit3" name="Dmodel" id="Dmodel" placeholder="abc" autocomplete="on" required>
        </th>
        </tr>
        <tr>
        <th style="float:left">
         Marca:
        </th>
        <th>
        <label><select name="Brand" id="Brand">
                
            <?php
            include("../modelo/conexion.php");
            $consulta="SELECT * FROM brands";
            $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
                ?>
                <?php foreach ($ejecutar as $opciones):?>
                <option value="<?php echo $opciones['IDb']?>" autocomplete="on"><?php echo $opciones['name']?></option>
                <?php endforeach ?>
            
            </select></label>
        </th>
        </tr>
        <tr>
        <th style="float:left">
         Categoria:
        </th>
        <th>
        <label><select name="Category" id="Category">
                
            <?php
            include("../modelo/conexion.php");
            $consulta="SELECT * FROM dicategories where clasification=0";
            $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
                ?>
                <?php foreach ($ejecutar as $opciones):?>
                <option value="<?php echo $opciones['IDc']?>" autocomplete="on"><?php echo $opciones['name']?></option>
                <?php endforeach ?>
            
            </select></label>
        </th>
        </tr>
        <tr>
        <th style="float:left">
         F.Compra:
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
        Habitaci&oacute;n
        </th>
        <th>
        <input type="number" id="sit3" name="room" id="room" placeholder="101" autocomplete="on" required>
        </th>
        </tr>
        
        </table>
        <br>
        <input type="submit" id="sit3" value="Registrar">
			</form>
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
