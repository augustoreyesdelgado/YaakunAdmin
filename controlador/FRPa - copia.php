<?php
include("../modelo/usuario.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$mifecha = date('Y-m-d H:i:s');
$object_usuario=new usuario();
if($_POST["preguntaA"]==1){
if($object_usuario->test2($mifecha,$_POST["pregunta1"],$_POST["pregunta2"],$_POST["pregunta3"],$_POST["pregunta4"],$_POST["pregunta5"],$_POST["pregunta6"],$_POST["pregunta7"],$_POST["pregunta8"],$_POST["pregunta9"],$_POST["pregunta10"],$_POST["pregunta11"],$_POST["pregunta12"],$_POST["pregunta13"],$_POST["pregunta14"],$_POST["pregunta15"],$_POST["pregunta16"],$_POST["pregunta17"],$_POST["pregunta18"],$_POST["pregunta19"],$_POST["pregunta20"],$_POST["pregunta21"],$_POST["pregunta22"],$_POST["pregunta23"],$_POST["pregunta24"],$_POST["pregunta25"],$_POST["pregunta26"],$_POST["pregunta27"],$_POST["pregunta28"],$_POST["pregunta29"],$_POST["pregunta30"],$_POST["pregunta31"],$_POST["pregunta32"],$_POST["pregunta33"],$_POST["pregunta34"],$_POST["pregunta35"],$_POST["pregunta36"],$_POST["pregunta37"],$_POST["pregunta38"],$_POST["pregunta39"],$_POST["pregunta40"],0,0,0,0,0,0)){
        header("Location: ../vista/FRPb.php");
    }else{
        header("Location: ../vista/error.php");
    }
}else{
    if($object_usuario->test2($mifecha,$_POST["pregunta1"],$_POST["pregunta2"],$_POST["pregunta3"],$_POST["pregunta4"],$_POST["pregunta5"],$_POST["pregunta6"],$_POST["pregunta7"],$_POST["pregunta8"],$_POST["pregunta9"],$_POST["pregunta10"],$_POST["pregunta11"],$_POST["pregunta12"],$_POST["pregunta13"],$_POST["pregunta14"],$_POST["pregunta15"],$_POST["pregunta16"],$_POST["pregunta17"],$_POST["pregunta18"],$_POST["pregunta19"],$_POST["pregunta20"],$_POST["pregunta21"],$_POST["pregunta22"],$_POST["pregunta23"],$_POST["pregunta24"],$_POST["pregunta25"],$_POST["pregunta26"],$_POST["pregunta27"],$_POST["pregunta28"],$_POST["pregunta29"],$_POST["pregunta30"],$_POST["pregunta31"],$_POST["pregunta32"],$_POST["pregunta33"],$_POST["pregunta34"],$_POST["pregunta35"],$_POST["pregunta36"],$_POST["pregunta37"],$_POST["pregunta38"],$_POST["pregunta39"],$_POST["pregunta40"],0,0,0,0,0,0)){
        header("Location: ../vista/FRPb1.php");
    }else{
        header("Location: ../vista/error.php");
    }
}
?>

     