<?php
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();
 if(isset($_POST["Name"]) && !empty($_POST["Name"]) && isset($_POST["Category"]) && !empty($_POST["Category"]) && isset($_POST["Idate"]) && !empty($_POST["Idate"]) && isset($_POST["Bcost"]) && !empty($_POST["Bcost"]) && isset($_POST["room"]) && !empty($_POST["room"])){
    $mifecha = $_POST["Idate"];
    $subfecha = date("Y-m-d",strtotime($mifecha."+ 1 month"));
    if($object_usuario->registrar_consumible($_POST["Name"],$_POST["Category"],$_POST["Idate"],$_POST["Bcost"],$_POST["room"],$subfecha)){
        header("Location: ../vista/Listadispositivos.php");
    }else{
        header("Location: ../vista/errorc.php");
    }
        
    }
?>