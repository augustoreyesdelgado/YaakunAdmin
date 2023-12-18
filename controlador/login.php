<?php
/* Este archivo nos ayuda a verificar las credenciales y el tipo del usuario */
include("../modelo/usuario.php");
session_start();
$usuario="";
$password="";
$object_usuario=new usuario();
 if(isset($_POST["user"]) && !empty($_POST["user"]) && isset($_POST["password"]) && !empty($_POST["password"]))
   {
    $usuario=$_POST["user"];
    $password=$_POST["password"];
    $object_usuario->setUser($usuario);
    $object_usuario->setPassword($password);
     if($object_usuario->busca_empresa()){
         $_SESSION["usrFirmado"]='0';
        header("Location: ../vista/inicioA.php");
     }
        else{
           header("Location: ../vista/errorne.php");}
     
   }
