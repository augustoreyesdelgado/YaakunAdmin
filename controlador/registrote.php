<?php
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();
$arrayC=$object_usuario->comparar($_POST["empresa"]);
if ($arrayC['numeroT']<$arrayC['Mtrabajadores']){
$_POST["tipo"]=0;
 if(isset($_POST["mail"]) && !empty($_POST["mail"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["apellidoP"]) && !empty($_POST["apellidoP"]) && isset($_POST["apellidoM"]) && !empty($_POST["apellidoM"]) && isset($_POST["edad"]) && !empty($_POST["edad"]) && isset($_POST["departamento"]) && !empty($_POST["departamento"]) && isset($_POST["experienciaactual"]) && !empty($_POST["experienciaactual"]) && isset($_POST["experienciatotal"]) && !empty($_POST["experienciatotal"])){
     
if($object_usuario->registrar_trabajador($_POST["empresa"],$_POST["mail"],$_POST["password"],$_POST["nombre"],$_POST["apellidoP"],$_POST["apellidoM"],$_POST["sexo"],$_POST["edad"],$_POST["estadocivil"],$_POST["niveldeestudios"],$_POST["departamento"],$_POST["puesto"],$_POST["contratacion"],$_POST["tipopersonal"],$_POST["tipodejornada"],$_POST["rotaciondeturnos"],$_POST["experienciaactual"],$_POST["experienciatotal"])){
         header("Location: ../vista/inicioE.php");
}else{
         header("Location: ../vista/errorc.php");
}   
}
}else{
    header("Location: ../vista/errorM.php");
}