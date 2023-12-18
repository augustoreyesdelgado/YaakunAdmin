<?php
include("../modelo/usuario.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$mifecha = date('Y-m-d H:i:s');
$object_usuario=new usuario();
if($object_usuario->test1($mifecha,1,$_POST["pregunta2"],$_POST["pregunta3"],$_POST["pregunta4"],$_POST["pregunta5"],$_POST["pregunta6"],$_POST["pregunta7"],$_POST["pregunta8"],$_POST["pregunta9"],$_POST["pregunta10"],$_POST["pregunta11"],$_POST["pregunta12"],$_POST["pregunta13"],$_POST["pregunta14"],$_POST["pregunta15"])){
        header("Location: ../vista/inicioT.php");
    }else{
        header("Location: ../vista/error.php");
    }

?>

     