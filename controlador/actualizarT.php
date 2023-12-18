<?php
/* Este archivo es es intermediario con la directiva para actualizar los datos del trabajador */
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();
$array=$object_usuario->obtener_datos();

if(empty($_POST["password"])){
    $_POST["password"]=$array['password'];
}
if(empty($_POST["nombre"])){
    $_POST["nombre"]=$array['nombre'];
}
if(empty($_POST["apellidoP"])){
    $_POST["apellidoP"]=$array['apellidoP'];
}
if(empty($_POST["apellidoM"])){
    $_POST["apellidoM"]=$array['apellidoM'];
}
if(empty($_POST["sexo"])){
    $_POST["sexo"]=$array['sexo'];
}
if(empty($_POST["edad"])){
    $_POST["edad"]=$array['edad'];
}
if(empty($_POST["estadocivil"])){
    $_POST["estadocivil"]=$array['estadocivil'];
}
if(empty($_POST["niveldeestudios"])){
    $_POST["niveldeestudios"]=$array['niveldeestudios'];
}
if(empty($_POST["departamento"])){
    $_POST["departamento"]=$array['departamento'];
}
if(empty($_POST["puesto"])){
    $_POST["puesto"]=$array['puesto'];
}
if(empty($_POST["contratacion"])){
    $_POST["contratacion"]=$array['contratacion'];
}
if(empty($_POST["tipopersonal"])){
    $_POST["tipopersonal"]=$array['tipopersonal'];
}
if(empty($_POST["tipodejornada"])){
    $_POST["tipodejornada"]=$array['tipodejornada'];
}
if(empty($_POST["rotaciondeturnos"])){
    $_POST["rotaciondeturnos"]=$array['rotaciondeturnos'];
}
if(empty($_POST["experienciaactual"])){
    $_POST["experienciaactual"]=$array['experienciaactual'];
}
if(empty($_POST["experienciatotal"])){
    $_POST["experienciatotal"]=$array['experienciatotal'];
}
    
if($object_usuario->modificar_trabajador($_POST["password"],$_POST["nombre"],$_POST["apellidoP"],$_POST["apellidoM"],$_POST["sexo"],$_POST["edad"], $_POST["estadocivil"],$_POST["niveldeestudios"],$_POST["departamento"],$_POST["puesto"],$_POST["contratacion"],$_POST["tipopersonal"],$_POST["tipodejornada"],$_POST["rotaciondeturnos"],$_POST["experienciaactual"],$_POST["experienciatotal"])){
        header("Location: ../vista/inicioT.php");
    }else{
        header("Location: ../vista/error.php");
    }
/*if(isset($_POST["edad"]) && !empty($_POST["edad"]) && isset($_POST["estatura"]) && !empty($_POST["estatura"]) && isset($_POST["direccion"]) && !empty($_POST["direccion"]) && isset($_POST["peso"]) && !empty($_POST["peso"])){*/
    
?>
     