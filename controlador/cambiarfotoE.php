<?php
/* Este archivo es es intermediario con la directiva para actualizar la foto de perfil del trabajador */
include_once("../modelo/usuario.php");
session_start();
$objecto_usuario=new usuario();

 if($_FILES["file1"]["error"]>0){
     header("Location: ../vista/errorf.php");
 }else{
     $nombre_archivo=$_FILES["file1"]['name'];
     $ruta="../vista/img/".$nombre_archivo;
     $archivo=$_FILES['file1']['tmp_name'];
     $subir=move_uploaded_file($archivo,$ruta);
     $objecto_usuario->cambiar_foto($ruta);
     header("Location: ../vista/inicioE.php");
 }