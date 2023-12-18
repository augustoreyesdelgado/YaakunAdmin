<?php
include("../modelo/usuario.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$mifecha = date('Y-m-d H:i:s');
$object_usuario=new usuario();
if($_POST["preguntaB"]==0){
if($object_usuario->test3b($mifecha,$_POST["pregunta65"],$_POST["pregunta66"],$_POST["pregunta67"],$_POST["pregunta68"])){
        header("Location: ../vista/inicioP.php");
    }else{
        header("Location: ../vista/error.php");
    }
}else{
   if($object_usuario->test3b($mifecha,$_POST["pregunta65"],$_POST["pregunta66"],$_POST["pregunta67"],$_POST["pregunta68"])){
        header("Location: ../vista/FREOc.php");
    }else{
        header("Location: ../vista/error.php");
    }
}
?>

     