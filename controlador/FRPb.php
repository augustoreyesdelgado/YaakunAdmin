<?php
include("../modelo/usuario.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$mifecha = date('Y-m-d H:i:s');
$object_usuario=new usuario();
if($_POST["preguntaB"]==0){
if($object_usuario->test2b($mifecha,$_POST["pregunta41"],$_POST["pregunta42"],$_POST["pregunta43"])){
        header("Location: ../vista/inicioP.php");
    }else{
        header("Location: ../vista/error.php");
    }
}else{
   if($object_usuario->test2b($mifecha,$_POST["pregunta41"],$_POST["pregunta42"],$_POST["pregunta43"])){
        header("Location: ../vista/FRPc.php");
    }else{
        header("Location: ../vista/error.php");
    }
}
?>

     