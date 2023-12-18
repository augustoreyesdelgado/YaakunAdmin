<?php
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();
 if(isset($_POST["Nmaintenance"]) && !empty($_POST["Nmaintenance"])){
    if($object_usuario->agendar_mantenimiento($_POST["IDD"],$_POST["Nmaintenance"])){
        header("Location: ../vista/habitacion.php");
    }else{
        header("Location: ../vista/errorc.php");
    }
        
    }
?>