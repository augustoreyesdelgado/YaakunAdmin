<?php
include("accesoBD.php");
 class usuario{
  private $password="";
  private $user ="";
  private $object_accesoBD=null;

    /*setter and getter para buscar el usuario y su contraseña*/     
    public function setUser($valor){
      $this->user=$valor;}
     
    public function setPassword($valor){
      $this->password=$valor;}
     
    public function getUser(){
      return $this->user;}   

    public function getPassword(){
      return $this->password;}
     
    public function busca_trabajador(){
        $respuesta=false;
        if($this->user=="" || $this->password==""){
          throw new Exception("Usuario->buscar: faltan datos");}
         else{
           $_SESSION["usuario"]=$this->user;
           $query_trabajador="SELECT u.correo , u.password FROM `usuarios` as u, `trabajadores` as p WHERE p.correo='".$this->user."' AND u.correo='".$this->user."' AND u.password='".$this->password."'";
           
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
             if($conexion_temporal){
                if($object_accesoBD->query($conexion_temporal,$query_trabajador)){
                    $this->obtener_datos();
                  $respuesta=true;}
                else{
                  $respuesta=false;}
             }
             $object_accesoBD->desconectar($conexion_temporal);
         }
        return $respuesta;
     }
     
    public function busca_empresa(){
        $respuesta=false;
        if($this->user=="" || $this->password==""){
          throw new Exception("Usuario->buscar: faltan datos");}
         else{
           $_SESSION["usuario"]=$this->user;
           $query_empresa="SELECT Uname , Pword FROM `users` WHERE Uname='".$this->user."' AND Pword='".$this->password."'";
           
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
             if($conexion_temporal){
                if($object_accesoBD->query($conexion_temporal,$query_empresa)){
                   /*$this->obtener_datos_empresa();*/
                  $respuesta=true;}
                 else{
                  $respuesta=false;}
             }
            $object_accesoBD->desconectar($conexion_temporal);
         }
        return $respuesta;
     }
     
    public function registrar_empresa($correo,$password,$razonsocial,$rfc,$domicilio,$telefono,$actividadprincipal,$nivel){
         $respuesta=false;
         if($correo==""||$password==""||$razonsocial=="" ||$rfc=="" ||$domicilio=="" ||$telefono=="" ||$actividadprincipal=="" ||$nivel==""){
             throw new Exception("Usuario->registrar: faltan datos");
         }else{
           if(($password===$razonsocial) || ($password===$correo)){
               header("Location: ../vista/error.php");
           }else{
           $query="SELECT correo FROM usuarios WHERE correo='".$correo."'";
           $query_usuario="INSERT INTO `usuarios`(`idusuario`,`correo`, `password`, `tipo`) VALUES ('','".$correo."','".$password."','0')";
           $query_empresa="INSERT INTO `empresa`(`correo`, `razonsocial`, `rfc`, `domicilio`, `telefono`, `actividadprincipal`, `nivel`, `numeroT`) VALUES ('".$correo."','".$razonsocial."','".$rfc."','".$domicilio."','".$telefono."','".$actividadprincipal."','".$nivel."','0')";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$query)){
                echo "correo ya registrado <br/>";
            }else{
             if($conexion_temporal){
               if($object_accesoBD->query_add($conexion_temporal,$query_usuario)){
                   $object_accesoBD->query_add($conexion_temporal,$query_empresa);
                   $respuesta=true;
               }
              }//cierra if conexion_temporal
            }
           $object_accesoBD->desconectar($conexion_temporal);
           }//cierra else para iniciar querys 
         }// cierra else si los campos estan llenos
      return $respuesta;   
     } // cierra la funcion
     
     
    public function registrar_dispositivo($Dmodel,$Brand,$Category,$Idate,$Bcost,$room,$nma){
        
         $respuesta=false;
         if($Dmodel==""||$Brand==""||$Category=="" ||$Idate=="" ||$Bcost==""||$room==""){
             throw new Exception("Usuario->registrar: faltan datos");
         }else{
            $object_accesoBD= new accesoBD();
            $conexion_temporal=$object_accesoBD->conectar();
            $query_dispositivo="INSERT INTO `devices`(`IDd`, `Dmodel`, `Brand`, `Category`, `Idate`, `Bcost`,`room`, `Nmaintenance`) VALUES ('','".$Dmodel."','".$Brand."','".$Category."','".$Idate."','".$Bcost."','".$room."','".$nma."')";
            $aux; 
              if($conexion_temporal){
                if($object_accesoBD->query_add($conexion_temporal,$query_dispositivo)){
                    $aux1=mysqli_query($conexion_temporal,"SELECT IDd FROM `devices` ORDER BY IDd DESC LIMIT 1");
                    while($mostrar=mysqli_fetch_array($aux1)){
                    $aux=$mostrar['IDd'];
                    }
                    $query_mantenimiento="INSERT INTO `maintenance` (`IDma`, `IDdiv`, `Lmaint`, `Category`, `status`, `Cost`, `Comment`, `puntero`, `apuntador`, `firm`) VALUES (NULL,'".$aux."','".$Idate."', '1', '1', '', '', '1', '1', NULL)";
                   $object_accesoBD->query_add($conexion_temporal,$query_mantenimiento);
                   $respuesta=true;
                }
              }
             
             $object_accesoBD->desconectar($conexion_temporal);
          
         }
         return $respuesta;
     }
     
     public function registrar_consumible($Dmodel,$Category,$Idate,$Bcost,$room,$nma){
        
         $respuesta=false;
         if($Dmodel==""||$Category=="" ||$Idate=="" ||$Bcost==""||$room==""){
             throw new Exception("Usuario->registrar: faltan datos");
         }else{
            $object_accesoBD= new accesoBD();
            $conexion_temporal=$object_accesoBD->conectar();
            $query_dispositivo="INSERT INTO `consumables`(`IDcs`, `cname`, `Category`, `Idate`, `Bcost`, `room`, `expiration`) VALUES (NULL,'".$Dmodel."','".$Category."','".$Idate."','".$Bcost."','".$room."','".$nma."')";
            $aux; 
              if($conexion_temporal){
                if($object_accesoBD->query_add($conexion_temporal,$query_dispositivo)){
                   $respuesta=true;
                }
              }
             
             $object_accesoBD->desconectar($conexion_temporal);
          
         }
         return $respuesta;
     }
     
     public function registrar_mantenimiento($IDD,$Idate,$Bcost,$Comment,$estado,$firm){
        
         $respuesta=false;
         if($Idate=="" ||$Bcost==""||$Comment==""){
             throw new Exception("Usuario->registrar: faltan datos");
         }else{
            $object_accesoBD= new accesoBD();
            $conexion_temporal=$object_accesoBD->conectar();
            $query_dispositivo="UPDATE `maintenance` SET `apuntador`='0' WHERE IDdiv='".$IDD."' and apuntador='1'";
              if($conexion_temporal){
                if($object_accesoBD->query_add($conexion_temporal,$query_dispositivo)){
                   $query_mantenimiento="INSERT INTO `maintenance`(`IDma`, `IDdiv`, `Lmaint`, `Category`, `status`, `Cost`, `Comment`, `puntero`, `apuntador`, `firm`) VALUES ('','".$IDD."','".$Idate."','1','".$estado."','".$Bcost."','".nl2br($Comment)."','1','1','".$firm."')";
                   $object_accesoBD->query_add($conexion_temporal,$query_mantenimiento);
                   $respuesta=true;
                }
              }
             
             $object_accesoBD->desconectar($conexion_temporal);
          
         }
         return $respuesta;
     }

     public function registrar_mantenimientoA($IDD,$Idate,$Bdate,$Bcost,$Comment,$estado,$firm){
        
        $respuesta=false;
        if($Idate=="" ||$Bcost==""||$Comment==""){
            throw new Exception("Usuario->registrar: faltan datos");
        }else{
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
           $query_dispositivo="UPDATE `maintenance` SET `apuntador`='0' WHERE IDdiv='".$IDD."' and apuntador='1'";
             if($conexion_temporal){
               if($object_accesoBD->query_add($conexion_temporal,$query_dispositivo)){
                  $query_mantenimiento="INSERT INTO `maintenance`(`IDma`, `IDdiv`, `Lmaint`, `Category`, `status`, `Cost`, `Comment`, `puntero`, `apuntador`, `firm`) VALUES ('','".$IDD."','".$Idate."','1','".$estado."','".$Bcost."','".nl2br($Comment)."','1','1','".$firm."')";
                  $query_dispositivo="UPDATE `devices` SET `Nmaintenance`='".$Bdate."' WHERE IDd='".$IDD."'";
                  $object_accesoBD->query_add($conexion_temporal,$query_mantenimiento);
                  $object_accesoBD->query_add($conexion_temporal,$query_dispositivo);
                  $respuesta=true;
               }
             }
            
            $object_accesoBD->desconectar($conexion_temporal);
         
        }
        return $respuesta;
    }
     
     public function agendar_mantenimiento($IDD,$Nmaintenance){
         $respuesta=false;
         if($IDD==""||$Nmaintenance==""){
             throw new Exception("Usuario->registrar: faltan datos");
         }else{
            $object_accesoBD= new accesoBD();
            $conexion_temporal=$object_accesoBD->conectar();
            $query_dispositivo="UPDATE `devices` SET `Nmaintenance`='".$Nmaintenance."' WHERE IDd='".$IDD."'";
              if($conexion_temporal){
                if($object_accesoBD->query_add($conexion_temporal,$query_dispositivo)){
                   $respuesta=true;
                }
              }
             
             $object_accesoBD->desconectar($conexion_temporal);
          
         }
         return $respuesta;
     }
     
     public function cambiar_estado($IDss,$n){
         $respuesta=false;
         if($IDss==""||$n==""){
             throw new Exception("Usuario->registrar: faltan datos");
         }else{
            $object_accesoBD= new accesoBD();
            $conexion_temporal=$object_accesoBD->conectar();
            $query_dispositivo="UPDATE `rooms` SET `status`='".$n."' WHERE IDr='".$IDss."'";
              if($conexion_temporal){
                if($object_accesoBD->query_add($conexion_temporal,$query_dispositivo)){
                   $respuesta=true;
                }
              }
             
             $object_accesoBD->desconectar($conexion_temporal);
          
         }
         return $respuesta;
     }
     
     /*public function registrar_mueble($Name,$Brand,$Category,$Idate,$Bcost,$room){
        
         $respuesta=false;
         if($Name==""||$Category=="" ||$Idate=="" ||$Bcost==""||$room==""){
             throw new Exception("Usuario->registrar: faltan datos");
         }else{
            $object_accesoBD= new accesoBD();
            $conexion_temporal=$object_accesoBD->conectar();
            $query_dispositivo="INSERT INTO `furiture`(`IDfu`, `Dmodel`, `Brand`, `Category`, `Idate`, `Bcost`,`room`) VALUES ('','".$Name."','".$Brand."','".$Category."','".$Idate."','".$Bcost."','".$room."')";
            $aux; 
              if($conexion_temporal){
                if($object_accesoBD->query_add($conexion_temporal,$query_dispositivo)){
                    $aux1=mysqli_query($conexion_temporal,"SELECT IDfu FROM `furniture` ORDER BY IDfu DESC LIMIT 1");
                    while($mostrar=mysqli_fetch_array($aux1)){
                    $aux=$mostrar['IDfu'];
                    }
                    $query_mantenimiento="INSERT INTO `maintenance`(`IDma`, `IDdiv`, `Lmaint`, `Sort`, `Cost`, `Comment`, `puntero`, `apuntador`) VALUES ('','".$aux."','".$Idate."','','','','1','1')";
                   $object_accesoBD->query_add($conexion_temporal,$query_mantenimiento);
                   $respuesta=true;
                }
              }
             
             $object_accesoBD->desconectar($conexion_temporal);
          
         }
         return $respuesta;
     }*/
     
    public function eliminar_trabajador($correo){//**************************************
         $respuesta=false;
           $query="DELETE FROM `usuarios` WHERE `correo`='".$correo."'";
           $query_empresa="UPDATE `empresa` SET `numeroT`=(`numeroT`-1) WHERE `correo`='".$_SESSION["usuario"]."'";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($conexion_temporal){
               if($object_accesoBD->update($conexion_temporal,$query)){
                  $object_accesoBD->update($conexion_temporal,$query_empresa);
                   $respuesta=true;
               }
            }
           $object_accesoBD->desconectar($conexion_temporal);
      return $respuesta;   
     }
     
    public function obtener_datos($id){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->datos($conexion_temporal,$id);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function obtener_datos_objeto($id){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->datos_objeto($conexion_temporal,$id);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function consultanivel($rs){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->rs($conexion_temporal,$rs);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function obtener_datosv($correo){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->datos($conexion_temporal,$correo);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
    public function obtener_datos_empresa(){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->datos_empresa($conexion_temporal,$_SESSION["usuario"]);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function contar($razonsocial){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->contarsql($conexion_temporal,$razonsocial);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function comparar($razonsocial){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->compararsql($conexion_temporal,$razonsocial);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function evaluar1(){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->evaluar1sql($conexion_temporal,$_SESSION["usuario"]);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function evaluar1E($correo){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->evaluar1sqlE($conexion_temporal,$correo);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     public function evaluar2(){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->evaluar2sql($conexion_temporal,$_SESSION["usuario"]);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function evaluar2E($correo){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->evaluar2sqlE($conexion_temporal,$correo);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     public function evaluar3(){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->evaluar3sql($conexion_temporal,$_SESSION["usuario"]);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
     public function evaluar3E($correo){
         $object_accesoBD= new accesoBD();
         $conexion_temporal=$object_accesoBD->conectar();
         $array=$object_accesoBD->evaluar3sqlE($conexion_temporal,$correo);
         $object_accesoBD->desconectar($conexion_temporal);
         return $array;
     }
     
    public function modificar_empresa($password,$razonsocial,$rfc,$domicilio,$telefono,$actividad,$nivel,$aux){
         $respuesta=false;
           $query_usuario="UPDATE usuarios SET password='".$password."' WHERE correo='".$_SESSION["usuario"]."'";
           $query_empresa="UPDATE empresa SET  razonsocial='".$razonsocial."', rfc='".$rfc."', domicilio='".$domicilio."', telefono='".$telefono."', actividadprincipal='".$actividad."', nivel='".$nivel."' WHERE correo='".$_SESSION["usuario"]."'";
           $query_empresa2="UPDATE trabajadores SET empresa='".$razonsocial."' WHERE empresa='".$aux."'";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($conexion_temporal){
               if($object_accesoBD->update($conexion_temporal,$query_usuario)){
                   $object_accesoBD->update($conexion_temporal,$query_empresa);
                   $object_accesoBD->update($conexion_temporal,$query_empresa2);
                   $respuesta=true;
               }
            }
           $object_accesoBD->desconectar($conexion_temporal);
      return $respuesta;   
     }
     
    public function modificar_trabajador($password,$nombre,$paterno,$materno, $sexo, $edad, $estadocivil,$niveldeestudios,$departamento,$puesto,$contratacion,$tipopersonal,$tipodejornada,$rotaciondeturnos,$experienciaactual,$experienciatotal){//**************************************
         $respuesta=false;
           $query_usuario="UPDATE usuarios SET password='".$password."' WHERE correo='".$_SESSION["usuario"]."'";
           $query_trabajador="UPDATE trabajadores SET nombre='".$nombre."', apellidoP='".$paterno."', apellidoM='".$materno."', sexo='".$sexo."', edad='".$edad."', estadocivil='".$estadocivil."', niveldeestudios='".$niveldeestudios."', departamento='".$departamento."', puesto='".$puesto."', contratacion='".$contratacion."', tipopersonal='".$tipopersonal."', tipodejornada='".$tipodejornada."', rotaciondeturnos='".$rotaciondeturnos."', experienciaactual='".$experienciaactual."', experienciatotal='".$experienciatotal."'  WHERE correo='".$_SESSION["usuario"]."'";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($conexion_temporal){
               if($object_accesoBD->update($conexion_temporal,$query_usuario)){
                  $object_accesoBD->update($conexion_temporal,$query_trabajador);
                   $respuesta=true;
               }
            }
           $object_accesoBD->desconectar($conexion_temporal);
      return $respuesta;   
     }
     
    public function cambiar_foto($ruta){
        $object_accesoBD= new accesoBD();
        $conexion_temporal=$object_accesoBD->conectar();
        $object_accesoBD->actualizar_foto($conexion_temporal,$ruta,$_SESSION["usuario"]);
        $object_accesoBD->desconectar($conexion_temporal);
    }
    
     public function test1I($mifecha,$pregunta1){
           $respuesta=false;
           $queryT="SELECT correo FROM `cuestionario1` WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificarb="UPDATE `maincuestionario` SET `fecha`='".$mifecha."' WHERE correo='".$_SESSION["usuario"]."' AND cuestionario='1'";
           $query_calificar1b="UPDATE `cuestionario1` SET `pregunta1`='".$pregunta1."' WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificar="INSERT INTO `maincuestionario`(`idtest`, `correo`, `fecha`, `cuestionario`) VALUES ('','".$_SESSION["usuario"]."','".$mifecha."','1')";
           $query_calificar1="INSERT INTO `cuestionario1`(`idq1`,`correo`,`pregunta1`, `pregunta2`, `pregunta3`) VALUES ('','".$_SESSION["usuario"]."','".$pregunta1."','0','0')";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$queryT)){
                if($object_accesoBD->query_add($conexion_temporal,$query_calificarb)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1b);
                   $respuesta=true;
               }
            }else{
            if($conexion_temporal){
               if($object_accesoBD->query_add($conexion_temporal,$query_calificar)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1);
                   $respuesta=true;
               }
              }
             }
      $object_accesoBD->desconectar($conexion_temporal); 
      return $respuesta;   
     }
     
     public function test1($mifecha,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15){
           $respuesta=false;
           $queryT="SELECT correo FROM `cuestionario1` WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificarb="UPDATE `maincuestionario` SET `fecha`='".$mifecha."' WHERE correo='".$_SESSION["usuario"]."' AND cuestionario='1'";
           $query_calificar1b="UPDATE `cuestionario1` SET `pregunta1`='".$p1."',`pregunta2`='".$p2."',`pregunta3`='".$p3."',`pregunta4`='".$p4."',`pregunta5`='".$p5."',`pregunta6`='".$p6."',`pregunta7`='".$p7."',`pregunta8`='".$p8."',`pregunta9`='".$p9."',`pregunta10`='".$p10."',`pregunta11`='".$p11."',`pregunta12`='".$p12."',`pregunta13`='".$p13."',`pregunta14`='".$p14."',`pregunta15`='".$p15."' WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificar="INSERT INTO `maincuestionario`(`idtest`, `correo`, `fecha`, `cuestionario`) VALUES ('','".$_SESSION["usuario"]."','".$mifecha."','1')";
           $query_calificar1="INSERT INTO `cuestionario1`(`idq1`,`correo`,`pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `pregunta11`, `pregunta12`, `pregunta13`, `pregunta14`, `pregunta15`) VALUES ('','".$_SESSION["usuario"]."','".$p1."','".$p2."','".$p3."','".$p4."','".$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p10."','".$p11."','".$p12."','".$p13."','".$p14."','".$p15."')";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$queryT)){
                if($object_accesoBD->query_add($conexion_temporal,$query_calificarb)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1b);
                   $respuesta=true;
               }
            }else{
            if($conexion_temporal){
               if($object_accesoBD->query_add($conexion_temporal,$query_calificar)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1);
                   $respuesta=true;
               }
              }
             }
      $object_accesoBD->desconectar($conexion_temporal); 
      return $respuesta;   
     }
     
     public function test2($mifecha,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16,$p17,$p18,$p19,$p20,$p21,$p22,$p23,$p24,$p25,$p26,$p27,$p28,$p29,$p30,$p31,$p32,$p33,$p34,$p35,$p36,$p37,$p38,$p39,$p40,$p41,$p42,$p43,$p44,$p45,$p46){
           $respuesta=false;
           $queryT="SELECT correo FROM `cuestionario2` WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificarb="UPDATE `maincuestionario` SET `fecha`='".$mifecha."' WHERE correo='".$_SESSION["usuario"]."' AND cuestionario='2'";
           $query_calificar1b="UPDATE `cuestionario2` SET `pregunta1`='".$p1."',`pregunta2`='".$p2."',`pregunta3`='".$p3."',`pregunta4`='".$p4."',`pregunta5`='".$p5."',`pregunta6`='".$p6."',`pregunta7`='".$p7."',`pregunta8`='".$p8."',`pregunta9`='".$p9."',`pregunta10`='".$p10."',`pregunta11`='".$p11."',`pregunta12`='".$p12."',`pregunta13`='".$p13."',`pregunta14`='".$p14."',`pregunta15`='".$p15."',`pregunta16`='".$p16."',`pregunta17`='".$p17."',`pregunta18`='".$p18."',`pregunta19`='".$p19."',`pregunta20`='".$p20."',`pregunta21`='".$p21."',`pregunta22`='".$p22."',`pregunta23`='".$p23."',`pregunta24`='".$p24."',`pregunta25`='".$p25."',`pregunta26`='".$p26."',`pregunta27`='".$p27."',`pregunta28`='".$p28."',`pregunta29`='".$p29."',`pregunta30`='".$p30."',`pregunta31`='".$p31."',`pregunta32`='".$p32."',`pregunta33`='".$p33."',`pregunta34`='".$p34."',`pregunta35`='".$p35."',`pregunta36`='".$p36."',`pregunta37`='".$p37."',`pregunta38`='".$p38."',`pregunta39`='".$p39."',`pregunta40`='".$p40."',`pregunta41`='".$p41."',`pregunta42`='".$p42."',`pregunta43`='".$p43."',`pregunta44`='".$p44."',`pregunta45`='".$p45."',`pregunta46`='".$p46."' WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificar="INSERT INTO `maincuestionario`(`idtest`, `correo`, `fecha`, `cuestionario`) VALUES ('','".$_SESSION["usuario"]."','".$mifecha."','2')";
           $query_calificar1="INSERT INTO `cuestionario2`(`idq2`,`correo`,`pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `pregunta11`, `pregunta12`, `pregunta13`, `pregunta14`, `pregunta15`, `pregunta16`, `pregunta17`, `pregunta18`, `pregunta19`, `pregunta20`, `pregunta21`, `pregunta22`, `pregunta23`, `pregunta24`, `pregunta25`, `pregunta26`, `pregunta27`, `pregunta28`, `pregunta29`, `pregunta30`, `pregunta31`, `pregunta32`, `pregunta33`, `pregunta34`, `pregunta35`, `pregunta36`, `pregunta37`, `pregunta38`, `pregunta39`, `pregunta40`, `pregunta41`, `pregunta42`, `pregunta43`, `pregunta44`, `pregunta45`, `pregunta46`) VALUES ('','".$_SESSION["usuario"]."','".$p1."','".$p2."','".$p3."','".$p4."','".$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p10."','".$p11."','".$p12."','".$p13."','".$p14."','".$p15."','".$p16."','".$p17."','".$p18."','".$p19."','".$p20."','".$p21."','".$p22."','".$p23."','".$p24."','".$p25."','".$p26."','".$p27."','".$p28."','".$p29."','".$p30."','".$p31."','".$p32."','".$p33."','".$p34."','".$p35."','".$p36."','".$p37."','".$p38."','".$p39."','".$p40."','".$p41."','".$p42."','".$p43."','".$p44."','".$p45."','".$p46."')";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$queryT)){
                if($object_accesoBD->query_add($conexion_temporal,$query_calificarb)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1b);
                   $respuesta=true;
               }
            }else{
            if($conexion_temporal){
               if($object_accesoBD->query_add($conexion_temporal,$query_calificar)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1);
                   $respuesta=true;
               }
              }
             }
      $object_accesoBD->desconectar($conexion_temporal); 
      return $respuesta;   
     }
     
     public function test2b($mifecha,$p41,$p42,$p43){
           $respuesta=false;
           $queryT="SELECT correo FROM `cuestionario2` WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificarb="UPDATE `maincuestionario` SET `fecha`='".$mifecha."' WHERE correo='".$_SESSION["usuario"]."' AND cuestionario='2'";
           $query_calificar1b="UPDATE `cuestionario2` SET `pregunta41`='".$p41."',`pregunta42`='".$p42."',`pregunta43`='".$p43."' WHERE correo='".$_SESSION["usuario"]."'";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$queryT)){
                if($object_accesoBD->query_add($conexion_temporal,$query_calificarb)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1b);
                   $respuesta=true;
               }
            }else{
            if($conexion_temporal){
               $respuesta=true;
              }
             }
      $object_accesoBD->desconectar($conexion_temporal); 
      return $respuesta;   
     }
     
     public function test2c($mifecha,$p44,$p45,$p46){
           $respuesta=false;
           $queryT="SELECT correo FROM `cuestionario2` WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificarb="UPDATE `maincuestionario` SET `fecha`='".$mifecha."' WHERE correo='".$_SESSION["usuario"]."' AND cuestionario='2'";
           $query_calificar1b="UPDATE `cuestionario2` SET `pregunta44`='".$p44."',`pregunta45`='".$p45."',`pregunta46`='".$p46."' WHERE correo='".$_SESSION["usuario"]."'";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$queryT)){
                if($object_accesoBD->query_add($conexion_temporal,$query_calificarb)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1b);
                   $respuesta=true;
               }
            }else{
            if($conexion_temporal){
               $respuesta=true;
              }
             }
      $object_accesoBD->desconectar($conexion_temporal); 
      return $respuesta;   
     }
     
     public function test3($mifecha,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16,$p17,$p18,$p19,$p20,$p21,$p22,$p23,$p24,$p25,$p26,$p27,$p28,$p29,$p30,$p31,$p32,$p33,$p34,$p35,$p36,$p37,$p38,$p39,$p40,$p41,$p42,$p43,$p44,$p45,$p46,$p47,$p48,$p49,$p50,$p51,$p52,$p53,$p54,$p55,$p56,$p57,$p58,$p59,$p60,$p61,$p62,$p63,$p64,$p65,$p66,$p67,$p68,$p69,$p70,$p71,$p72){
           $respuesta=false;
           $queryT="SELECT correo FROM `cuestionario3` WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificarb="UPDATE `maincuestionario` SET `fecha`='".$mifecha."' WHERE correo='".$_SESSION["usuario"]."' AND cuestionario='3'";
           $query_calificar1b="UPDATE `cuestionario3` SET `pregunta1`='".$p1."',`pregunta2`='".$p2."',`pregunta3`='".$p3."',`pregunta4`='".$p4."',`pregunta5`='".$p5."',`pregunta6`='".$p6."',`pregunta7`='".$p7."',`pregunta8`='".$p8."',`pregunta9`='".$p9."',`pregunta10`='".$p10."',`pregunta11`='".$p11."',`pregunta12`='".$p12."',`pregunta13`='".$p13."',`pregunta14`='".$p14."',`pregunta15`='".$p15."',`pregunta16`='".$p16."',`pregunta17`='".$p17."',`pregunta18`='".$p18."',`pregunta19`='".$p19."',`pregunta20`='".$p20."',`pregunta21`='".$p21."',`pregunta22`='".$p22."',`pregunta23`='".$p23."',`pregunta24`='".$p24."',`pregunta25`='".$p25."',`pregunta26`='".$p26."',`pregunta27`='".$p27."',`pregunta28`='".$p28."',`pregunta29`='".$p29."',`pregunta30`='".$p30."',`pregunta31`='".$p31."',`pregunta32`='".$p32."',`pregunta33`='".$p33."',`pregunta34`='".$p34."',`pregunta35`='".$p35."',`pregunta36`='".$p36."',`pregunta37`='".$p37."',`pregunta38`='".$p38."',`pregunta39`='".$p39."',`pregunta40`='".$p40."',`pregunta41`='".$p41."',`pregunta42`='".$p42."',`pregunta43`='".$p43."',`pregunta44`='".$p44."',`pregunta45`='".$p45."',`pregunta46`='".$p46."',`pregunta47`='".$p47."',`pregunta48`='".$p48."',`pregunta49`='".$p49."',`pregunta50`='".$p50."',`pregunta51`='".$p51."',`pregunta52`='".$p52."',`pregunta53`='".$p53."',`pregunta54`='".$p54."',`pregunta55`='".$p55."',`pregunta56`='".$p56."',`pregunta57`='".$p57."',`pregunta58`='".$p58."',`pregunta59`='".$p59."',`pregunta60`='".$p60."',`pregunta61`='".$p61."',`pregunta62`='".$p62."',`pregunta63`='".$p63."',`pregunta64`='".$p64."',`pregunta65`='".$p65."',`pregunta66`='".$p66."',`pregunta67`='".$p67."',`pregunta68`='".$p68."',`pregunta69`='".$p69."',`pregunta70`='".$p70."',`pregunta71`='".$p71."',`pregunta72`='".$p72."' WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificar="INSERT INTO `maincuestionario`(`idtest`, `correo`, `fecha`, `cuestionario`) VALUES ('','".$_SESSION["usuario"]."','".$mifecha."','3')";
           $query_calificar1="INSERT INTO `cuestionario3`(`idq3`,`correo`,`pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `pregunta11`, `pregunta12`, `pregunta13`, `pregunta14`, `pregunta15`, `pregunta16`, `pregunta17`, `pregunta18`, `pregunta19`, `pregunta20`, `pregunta21`, `pregunta22`, `pregunta23`, `pregunta24`, `pregunta25`, `pregunta26`, `pregunta27`, `pregunta28`, `pregunta29`, `pregunta30`, `pregunta31`, `pregunta32`, `pregunta33`, `pregunta34`, `pregunta35`, `pregunta36`, `pregunta37`, `pregunta38`, `pregunta39`, `pregunta40`, `pregunta41`, `pregunta42`, `pregunta43`, `pregunta44`, `pregunta45`, `pregunta46`, `pregunta47`, `pregunta48`, `pregunta49`, `pregunta50`, `pregunta51`, `pregunta52`, `pregunta53`, `pregunta54`, `pregunta55`, `pregunta56`, `pregunta57`, `pregunta58`, `pregunta59`, `pregunta60`, `pregunta61`, `pregunta62`, `pregunta63`, `pregunta64`, `pregunta65`, `pregunta66`, `pregunta67`, `pregunta68`, `pregunta69`, `pregunta70`, `pregunta71`, `pregunta72`) VALUES ('','".$_SESSION["usuario"]."','".$p1."','".$p2."','".$p3."','".$p4."','".$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p10."','".$p11."','".$p12."','".$p13."','".$p14."','".$p15."','".$p16."','".$p17."','".$p18."','".$p19."','".$p20."','".$p21."','".$p22."','".$p23."','".$p24."','".$p25."','".$p26."','".$p27."','".$p28."','".$p29."','".$p30."','".$p31."','".$p32."','".$p33."','".$p34."','".$p35."','".$p36."','".$p37."','".$p38."','".$p39."','".$p40."','".$p41."','".$p42."','".$p43."','".$p44."','".$p45."','".$p46."','".$p47."','".$p48."','".$p49."','".$p50."','".$p51."','".$p52."','".$p53."','".$p54."','".$p55."','".$p56."','".$p57."','".$p58."','".$p59."','".$p60."','".$p61."','".$p62."','".$p63."','".$p64."','".$p65."','".$p66."','".$p67."','".$p68."','".$p69."','".$p70."','".$p71."','".$p72."')";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$queryT)){
                if($object_accesoBD->query_add($conexion_temporal,$query_calificarb)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1b);
                   $respuesta=true;
               }
            }else{
            if($conexion_temporal){
               if($object_accesoBD->query_add($conexion_temporal,$query_calificar)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1);
                   $respuesta=true;
               }
              }
             }
      $object_accesoBD->desconectar($conexion_temporal); 
      return $respuesta;   
     }
     
     public function test3b($mifecha,$p65,$p66,$p67,$p68){
           $respuesta=false;
           $queryT="SELECT correo FROM `cuestionario3` WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificarb="UPDATE `maincuestionario` SET `fecha`='".$mifecha."' WHERE correo='".$_SESSION["usuario"]."' AND cuestionario='3'";
           $query_calificar1b="UPDATE `cuestionario3` SET `pregunta65`='".$p65."',`pregunta66`='".$p66."',`pregunta67`='".$p67."',`pregunta68`='".$p68."' WHERE correo='".$_SESSION["usuario"]."'";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$queryT)){
                if($object_accesoBD->query_add($conexion_temporal,$query_calificarb)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1b);
                   $respuesta=true;
               }
            }else{
            if($conexion_temporal){
               $respuesta=true;
              }
             }
      $object_accesoBD->desconectar($conexion_temporal); 
      return $respuesta;   
     }
     
     public function test3c($mifecha,$p69,$p70,$p71,$p72){
           $respuesta=false;
           $queryT="SELECT correo FROM `cuestionario3` WHERE correo='".$_SESSION["usuario"]."'";
           $query_calificarb="UPDATE `maincuestionario` SET `fecha`='".$mifecha."' WHERE correo='".$_SESSION["usuario"]."' AND cuestionario='3'";
           $query_calificar1b="UPDATE `cuestionario3` SET `pregunta69`='".$p69."',`pregunta70`='".$p70."',`pregunta71`='".$p71."',`pregunta72`='".$p72."' WHERE correo='".$_SESSION["usuario"]."'";
           $object_accesoBD= new accesoBD();
           $conexion_temporal=$object_accesoBD->conectar();
            if($object_accesoBD->query($conexion_temporal,$queryT)){
                if($object_accesoBD->query_add($conexion_temporal,$query_calificarb)){
                   $object_accesoBD->query_add($conexion_temporal,$query_calificar1b);
                   $respuesta=true;
               }
            }else{
            if($conexion_temporal){
               $respuesta=true;
              }
             }
      $object_accesoBD->desconectar($conexion_temporal); 
      return $respuesta;   
     }
     
}
?>