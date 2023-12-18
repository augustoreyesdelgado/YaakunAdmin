<?php
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();

if($_POST["est"]=='Liberar'){
 
if(isset($_POST["IDss"]) && !empty($_POST["IDss"])){
    if($object_usuario->cambiar_estado($_POST["IDss"],1)){
        header("Location: ../vista/Listahabitaciones.php");
    }else{
        header("Location: ../vista/errorc.php");
    }
        
    }    
    
} else if ($_POST["est"]=='En uso'){
 
if(isset($_POST["IDss"]) && !empty($_POST["IDss"])){
    if($object_usuario->cambiar_estado($_POST["IDss"],2)){
        header("Location: ../vista/Listahabitaciones.php");
    }else{
        header("Location: ../vista/errorc.php");
    }
        
    }    
    
}
?>