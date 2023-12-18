<?php
include("../modelo/usuario.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$mifecha = date('Y-m-d H:i:s');
$object_usuario=new usuario();
if($_POST["pregunta1"]==0){
    if($object_usuario->test1($mifecha,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)){
    header("Location: ../vista/inicioT.php");
    }else{
        header("Location: ../vista/error.php");
    }
}else{
    header("Location: ../vista/ATSa.php");
}
?>

     