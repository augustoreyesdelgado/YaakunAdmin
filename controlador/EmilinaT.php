<?php
include("../modelo/usuario.php");
session_start();
$object_usuario=new usuario();
if($object_usuario->eliminar_trabajador($_POST["tte"])){
         header("Location: ../vista/listatrabajadores.php");
         echo $_POST["tte"];
}else{
         header("Location: ../vista/errorE.php");
}   