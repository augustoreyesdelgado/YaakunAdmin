<?php
include("../modelo/usuario.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$mifecha = date('Y-m-d H:i:s');
$object_usuario=new usuario();
if($object_usuario->test3c($mifecha,$_POST["pregunta69"],$_POST["pregunta70"],$_POST["pregunta71"],$_POST["pregunta72"])){
        header("Location: ../vista/inicioP.php");
    }else{
        header("Location: ../vista/error.php");
    }

?>

     