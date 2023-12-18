<?php
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();
$_POST["tipo"]=1;
 if(isset($_POST["mail"]) && !empty($_POST["mail"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["razonsocial"]) && !empty($_POST["razonsocial"]) && isset($_POST["rfc"]) && !empty($_POST["rfc"]) && isset($_POST["domicilio"]) && !empty($_POST["domicilio"]) && isset($_POST["actividad"]) && !empty($_POST["actividad"]) && isset($_POST["nivel"]) && !empty($_POST["nivel"])){
     
    if($object_usuario->registrar_empresa($_POST["mail"],$_POST["password"],$_POST["razonsocial"],$_POST["rfc"],$_POST["domicilio"],$_POST["telefono"],$_POST["actividad"],$_POST["nivel"])){
        header("Location: ../vista/inicioC.php");
    }else{
        header("Location: ../vista/errorc.php");
    }
        
    }
?>