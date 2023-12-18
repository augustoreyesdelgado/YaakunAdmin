<?php
include("../modelo/usuario.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$mifecha = date('Y-m-d H:i:s');
$object_usuario=new usuario();
if($object_usuario->test3($mifecha,$_POST["p1"],$_POST["p2"],$_POST["p3"],$_POST["p4"],$_POST["p5"],$_POST["p6"],$_POST["p7"],$_POST["p8"],$_POST["p9"],$_POST["p10"],$_POST["p11"],$_POST["p12"],$_POST["p13"],$_POST["p14"],$_POST["p15"],$_POST["p16"],$_POST["p17"],$_POST["p18"],$_POST["p19"],$_POST["p20"],$_POST["p21"],$_POST["p22"],$_POST["p23"],$_POST["p24"],$_POST["p25"],$_POST["p26"],$_POST["p27"],$_POST["p28"],$_POST["p29"],$_POST["p30"],$_POST["p31"],$_POST["p32"],$_POST["p33"],$_POST["p34"],$_POST["p35"],$_POST["p36"],$_POST["p37"],$_POST["p38"],$_POST["p39"],$_POST["p40"],$_POST["p41"],$_POST["p42"],$_POST["p43"],$_POST["p44"],$_POST["p45"],$_POST["p46"],$_POST["p47"],$_POST["p48"],$_POST["p49"],$_POST["p50"],$_POST["p51"],$_POST["p52"],$_POST["p53"],$_POST["p54"],$_POST["p55"],$_POST["p56"],$_POST["p57"],$_POST["p58"],$_POST["p59"],$_POST["p60"],$_POST["p61"],$_POST["p62"],$_POST["p63"],$_POST["p64"],$_POST["p65"],$_POST["p66"],$_POST["p67"],$_POST["p68"],$_POST["p69"],$_POST["p70"],$_POST["p71"],$_POST["p72"])){
    header("Location: ../vista/inicioT.php");
    }else{
        header("Location: ../vista/error.php");
    }

?>
     