<?php
session_start();
include_once("..\modelo\usuario.php");
include_once("HeaderA.html");
if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
?>
        
        <div class="containerF1">
                
        <div class="item" style="padding:2%">
       
        <div style="height: 720px; margin-top:12%" class="table-wrapper-scroll-y my-custom-scrollbarA1">

        <table border="1" id="tablaL" style="">
        <tr>
        <th scope="col" style="width:5%">Menu R&aacute;pido</th>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="selecciondehabitaciones.php">Supervisi&oacute;n movil</a></td>
        </tr>
        
        <tr>
        <td scope="col" style="width:5%"><a href="ingresoshotel.php">Ingresos Hotel</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="ingresosdepartamento.php">Egresos Hotel</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">Lista de Asistencia</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">Reportes</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">Reporte Diario</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">Reporte Gerencial</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">Consultas</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">Clientes</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="Listadispositivos.php">Mantenimiento de Dispositivos</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">Mantenimiento de Estructura</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr><tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <td scope="col" style="width:5%"><a href="">place holder</a></td>
        </tr>

        <tr>
        <th scope="col" style="width:5%" ><a href="">GUIA DE USUARIO</a></th>
        </tr>

        </table>
            
        </div>
        </div>
            
        
        <div class="item">

        <div class="container20x80">
            
        <div class="containerG2100" style="width:73%">
        
        <div class="item">
        
        <table style="margin-top:10%;background-color:white">
        <th colspan="4"><center>Tabla Resumen</center></th>
        <tr>
        <th colspan="4"><center>Fecha de Hoy: <?php echo date("Y-m-d");?></center></th>
        </tr>
        <tr>
        <td scope="col" style="width:3%">Procentaje de Ocupaci&oacute;n</td>
        <td scope="col" style="width:3%">Porcentaje de Asistencia</td>
        <td scope="col" style="width:3%">Ingresos brutos</td>
        <td scope="col" style="width:3%">Egresos</td>
        </tr>
        <tr>
        <td scope="col" style="width:3%">NAN%</td>
        <td scope="col" style="width:3%">NAN%</td>
        <td scope="col" style="width:3%">NAN</td>
        <td scope="col" style="width:3%">NAN</td> 
        </tr>
        <th colspan="4"><center>Corte de ayer</center></th>
        <tr>
        <td scope="col" style="width:3%">Procentaje de Ocupaci&oacute;n</td>
        <td scope="col" style="width:3%">Porcentaje de Asistencia</td>
        <td colspan="2" scope="col" style="width:3%"><center>Ingresos Netos</center></td>
        </tr>
        <tr>
        <td scope="col" style="width:3%">NAN%</td>
        <td scope="col" style="width:3%">NAN%</td>
        <td colspan="2" scope="col" style="width:3%"><center>NAN</center></td>    
        </tr>
        </table>    
            
        </div>

        <div class="item" >
            
        <center>
        <a href="inicioC.php"><img style="width: 25%;border-radius:10px;centered;margin-top:10%" onmouseout="this.src='img/controlm.png'" onmouseover="this.src='img/controlAm.png'" src="img/controlm.png"></a>    
            
        <a href="inicioE.php"><img style="width: 25%;border-radius:10px;centered;margin-top:10%" onmouseout="this.src='img/modulomantenimientom.png'" onmouseover="this.src='img/modulomantenimientoAm.png'" src="img/modulomantenimientom.png"></a>
            
        <a href="../controlador/logout.php"><img style="width: 20%;border-radius:15px;centered;margin-left:20%" onmouseout="this.src='img/cerrar.png'" onmouseover="this.src='img/cerrarA.jpg'" src="img/cerrar.png"></a>   
        </center>    
            
        </div>
        

        </div>
            
        <div style="width:73%;padding-top:1%">
        <?php include_once("mapacalendarioM.php") ?>    
        </div>
            
        </div>
        </div>
            
        
        </div>
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