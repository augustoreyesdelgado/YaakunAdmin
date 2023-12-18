<?php 
/* Se verificará que la sesión este iniciada, en tal caso, se rediriguirá a la vista principal de usuario*/
  session_start();
  if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='0'){
  header("Location: vista/inicioA.php");
  }else if (isset($_SESSION["usrFirmado"]) && $_SESSION["usrFirmado"]=='1'){
  header("Location: vista/inicioT.php");
  }else{
?>
<?php
/* Se incluye el encabezado, que contiene los estilos*/
include("vista/Header.html");
?>
<br><?php /*En esta seccion esta el formulario para iniciar sesión*/ ?>

  <center><div class= "contenedordin" style="float:right;font-family:High Tower Text"><br>
     <center>Inciar sesi&oacute;n</center><br><br>
        <form id="frm" method="post" action="controlador\login.php">
         
          Usuario <input type="text" id="sit" name="user" placeholder="ejemplo: Administrador" autocomplete="on" required="true"/><br><br>
          
          Password  <input type="password" id="sit" name="password" placeholder="*****************" autocomplete="on" required="true"/><br><br><br>
          
          <input id="input1" type="submit" value="Iniciar Sesión">      
        </form><br><br>
      <?php /*En esta seccion se va a los distitos formularios de registro*/ ?>
      
    </div>
    </center>
<?php /*En esta seccion hay informacion del portal*/ ?>

    <center>
        <div style="color:white;font-family:Helvetica;float:left;width: 50%;text-align: justify;margin-left:5%;background-color:rgba(0, 0, 0, 0.81);border-radius: 3px;">
        <h2>Bienvenido</h2>
        <p>El objetivo de esta aplicaci&oacute;n es apoyarlo en la administraci&oacute;n de su negocio.</p>
        Incie sesi&oacute;n para continuar.
        </div>
        <?php 
      /*Se incluye en la pagina el siguiente banner*/
      include_once("vista/Baner.html");?>
    </center>

<div>
    <br><br><br></div>
<?php /*se incluye el pie*/
include_once("vista/Pie.html");
?>
<?php
    }
?>