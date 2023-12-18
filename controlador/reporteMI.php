<?php
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();

     if($_POST["Bcost"]=='0'){
         $_POST["Bcost"]='0.0';
     }
 if(isset($_POST["Idate"]) && !empty($_POST["Idate"]) && isset($_POST["Bdate"]) && !empty($_POST["Bdate"]) && isset($_POST["Bcost"]) && !empty($_POST["Bcost"]) && isset($_POST["Comment"]) && !empty($_POST["Comment"]) && isset($_POST["estado"]) && !empty($_POST["estado"]) && isset($_POST["firm"]) && !empty($_POST["firm"])){
     
    if($object_usuario->registrar_mantenimientoA($_POST["IDD"],$_POST["Idate"],$_POST["Bdate"],$_POST["Bcost"],$_POST["Comment"],$_POST["estado"],$_POST["firm"])){
        header("Location: ../vista/habitacionvs.php");
    }else{
        header("Location: ../vista/errorc.php");
    }
        
    }
?>