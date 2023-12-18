<?php
/* Este archivo es es intermediario con la directiva para actualizar los datos de la empresa */
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();
$array=$object_usuario->obtener_datos_empresa();

if(empty($_POST["password"])){
    $_POST["password"]=$array['password'];
}
if(empty($_POST["razonsocial"])){
    $_POST["razonsocial"]=$array['razonsocial'];
}
if(empty($_POST["rfc"])){
    $_POST["rfc"]=$array['rfc'];
}
if(empty($_POST["domicilio"])){
    $_POST["domicilio"]=$array['domicilio'];
}
if(empty($_POST["telefono"])){
    $_POST["telefono"]=$array['telefono'];
}
if(empty($_POST["actividad"])){
    $_POST["actividad"]=$array['actividadprincipal'];
}
if(empty($_POST["nivel"])){
    $_POST["nivel"]=$array['nivel'];
}
     
if($object_usuario->modificar_empresa($_POST["password"],$_POST["razonsocial"],$_POST["rfc"],$_POST["domicilio"],$_POST["telefono"],$_POST["actividad"],$_POST["nivel"],$array['razonsocial'])){
        header("Location: ../vista/inicioE.php");
    }else{
        header("Location: ../vista/inicioE.php");
    }