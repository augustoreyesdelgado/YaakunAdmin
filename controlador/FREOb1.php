<?php
include("../modelo/usuario.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$mifecha = date('Y-m-d H:i:s');
$object_usuario=new usuario();
if($_POST["preguntaB"]==0){
        header("Location: ../vista/inicioP.php");
}else{
        header("Location: ../vista/FREOc.php");
}
?>

     