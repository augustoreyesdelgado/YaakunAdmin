<?php
class accesoBD{
    
    function conectar(){
        $conexion=mysqli_connect("localhost","root","","yaakun") or die ("Error al conectar la base de datos ");
        return $conexion;
    }
    
    function desconectar($conexion){
        mysqli_close($conexion);
    }
    
    function query($conexion,$query){
        $respuesta=false;
        if($query==null){throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");}
        if($query != null){
            $resultado=mysqli_query($conexion,$query);
            $fila=mysqli_num_rows($resultado);
             if($fila>0){
                $respuesta=true;}
         }
        return $respuesta;
    }
    
    function query_add($conexion,$query){
        $respuesta=false;
         if($query==null){throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");}
         else{
            $resultado=mysqli_query($conexion,$query);
             //if(resultado != null){
                $respuesta=true;
             //}
         }
        return $respuesta;
    }
    
    function datos($conexion,$email){ //****************************************************************
    $query = "SELECT r.IDr, c.Rsort, r.status from rooms as r inner join rcategories as c on r.sort=c.IDrc where r.IDr='".$email."'";  
    $result = mysqli_query($conexion, $query) or die ("falla en la query");  
    $ret = mysqli_fetch_array($result);
    return $ret;
    }
    
    function datos_objeto($conexion,$email){ //****************************************************************
    $query = "SELECT d.Dmodel,d.room, sum(m.puntero) as puntero, sum(m.Cost) as Cost from devices as d inner join maintenance as m where d.IDd=m.IDdiv and d.IDd='".$email."'";  
    $result = mysqli_query($conexion, $query) or die ("falla en la query");  
    $ret = mysqli_fetch_array($result);
    return $ret;
    }
    
    function rs($conexion,$rs){ //****************************************************************
    $query = "SELECT nivel as n FROM empresa where razonsocial='".$rs."'";  
    $result = mysqli_query($conexion, $query) or die ("falla en la query");  
    $ret = mysqli_fetch_array($result);
    return $ret;
  }
  
    function datos_empresa($conexion,$email){
      $query="SELECT s.correo, s.password, s.foto, p.razonsocial, p.rfc, p.actividadprincipal, p.domicilio, p.telefono, p.nivel FROM usuarios as s, empresa as p where s.correo='".$email."' AND p.correo='".$email."'";
      $result=mysqli_query($conexion,$query);
      $ret=mysqli_fetch_array($result);
      return $ret; 
    }
    
    function contarsql($conexion,$razonsocial){
      $query="SELECT COUNT(*) as p FROM `trabajadores` WHERE `empresa`='".$razonsocial."'";
      $query1="SELECT COUNT(*) FROM maincuestionario m INNER JOIN trabajadores u ON u.correo=m.correo WHERE m.cuestionario='1' and u.empresa='".$razonsocial."'";
      $query2="SELECT COUNT(*) FROM maincuestionario m INNER JOIN trabajadores u ON u.correo=m.correo WHERE m.cuestionario='2' and u.empresa='".$razonsocial."'";
      $query3="SELECT COUNT(*) FROM maincuestionario m INNER JOIN trabajadores u ON u.correo=m.correo WHERE m.cuestionario='3' and u.empresa='".$razonsocial."'";
      $result=mysqli_query($conexion,$query);
      $q1=mysqli_query($conexion,$query1);
      $q2=mysqli_query($conexion,$query2);
      $q3=mysqli_query($conexion,$query3);
      $ret=mysqli_fetch_array($result);
      $ret1=mysqli_fetch_array($q1);
      $ret2=mysqli_fetch_array($q2);
      $ret3=mysqli_fetch_array($q3);
      array_push($ret, $ret1[0], $ret2[0], $ret3[0]);
      return $ret; 
    }
    function compararsql($conexion,$razonsocial){
      $query="SELECT p.numeroT, q.Mtrabajadores FROM empresa as p, nivel as q WHERE p.razonsocial='".$razonsocial."' AND p.nivel=q.nivel";
      $result=mysqli_query($conexion,$query);
      $ret=mysqli_fetch_array($result);
      return $ret; 
    }
    function evaluar1sql($conexion,$email){
      $query="SELECT (u.pregunta1+u.pregunta2+u.pregunta3+u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10+u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15) as r, u.correo as c, (u.pregunta2+u.pregunta3) as s1, (u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10) as s2, (u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15) as s3, m.fecha FROM maincuestionario m INNER JOIN cuestionario1 u ON u.correo=m.correo WHERE m.cuestionario='1' and u.correo='".$email."'";
      $result=mysqli_query($conexion,$query);
      $ret=mysqli_fetch_array($result);
      return $ret; 
    }
    
    function evaluar1sqlE($conexion,$email){
      $query="SELECT (u.pregunta1+u.pregunta2+u.pregunta3+u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10+u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15) as r, u.correo as c, (u.pregunta2+u.pregunta3) as s1, (u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10) as s2, (u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15) as s3, m.fecha FROM maincuestionario m INNER JOIN cuestionario1 u ON u.correo=m.correo WHERE m.cuestionario='1' and u.correo='".$email."'";
      $result=mysqli_query($conexion,$query);
      $ret=mysqli_fetch_array($result);
      return $ret; 
    }
    
    function evaluar2sql($conexion,$email){
      $query="SELECT (u.pregunta1+u.pregunta2+u.pregunta3+u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10+u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15+u.pregunta16+u.pregunta17+u.pregunta18+u.pregunta19+u.pregunta20+u.pregunta21+u.pregunta22+u.pregunta23+u.pregunta24+u.pregunta25+u.pregunta26+u.pregunta27+u.pregunta28+u.pregunta29+u.pregunta30+u.pregunta31+u.pregunta32+u.pregunta33+u.pregunta34+u.pregunta35+u.pregunta36+u.pregunta37+u.pregunta38+u.pregunta39+u.pregunta40+u.pregunta41+u.pregunta42+u.pregunta43+u.pregunta44+u.pregunta45+u.pregunta46) as r, (u.pregunta1+u.pregunta2+u.pregunta3) as r1, (u.pregunta4+u.pregunta9+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta41+u.pregunta42+u.pregunta43+u.pregunta10+u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta20+u.pregunta21+u.pregunta22+u.pregunta18+u.pregunta19+u.pregunta27+u.pregunta26) as r2, (u.pregunta14+u.pregunta15+u.pregunta16+u.pregunta17) as r3, (u.pregunta23+u.pregunta24+u.pregunta25+u.pregunta28+u.pregunta29+u.pregunta30+u.pregunta31+u.pregunta32+u.pregunta44+u.pregunta45+u.pregunta46+u.pregunta33+u.pregunta34+u.pregunta35+u.pregunta36+u.pregunta37+u.pregunta38+u.pregunta39+u.pregunta40) as r4, (u.pregunta2+u.pregunta3) as s1, u.correo as c, (u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10) as s2, (u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15) as s3, m.fecha FROM maincuestionario m INNER JOIN cuestionario2 u ON u.correo=m.correo WHERE m.cuestionario='2' and u.correo='".$email."'";
      $result=mysqli_query($conexion,$query);
      $ret=mysqli_fetch_array($result);
      return $ret; 
    }
    
    function evaluar2sqlE($conexion,$email){
      $query="SELECT (u.pregunta1+u.pregunta2+u.pregunta3+u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10+u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15+u.pregunta16+u.pregunta17+u.pregunta18+u.pregunta19+u.pregunta20+u.pregunta21+u.pregunta22+u.pregunta23+u.pregunta24+u.pregunta25+u.pregunta26+u.pregunta27+u.pregunta28+u.pregunta29+u.pregunta30+u.pregunta31+u.pregunta32+u.pregunta33+u.pregunta34+u.pregunta35+u.pregunta36+u.pregunta37+u.pregunta38+u.pregunta39+u.pregunta40+u.pregunta41+u.pregunta42+u.pregunta43+u.pregunta44+u.pregunta45+u.pregunta46) as r, (u.pregunta1+u.pregunta2+u.pregunta3) as r1, (u.pregunta4+u.pregunta9+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta41+u.pregunta42+u.pregunta43+u.pregunta10+u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta20+u.pregunta21+u.pregunta22+u.pregunta18+u.pregunta19+u.pregunta27+u.pregunta26) as r2, (u.pregunta14+u.pregunta15+u.pregunta16+u.pregunta17) as r3, (u.pregunta23+u.pregunta24+u.pregunta25+u.pregunta28+u.pregunta29+u.pregunta30+u.pregunta31+u.pregunta32+u.pregunta44+u.pregunta45+u.pregunta46+u.pregunta33+u.pregunta34+u.pregunta35+u.pregunta36+u.pregunta37+u.pregunta38+u.pregunta39+u.pregunta40) as r4, (u.pregunta2+u.pregunta3) as s1, u.correo as c, (u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10) as s2, (u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15) as s3, m.fecha FROM maincuestionario m INNER JOIN cuestionario2 u ON u.correo=m.correo WHERE m.cuestionario='2' and u.correo='".$email."'";
      $result=mysqli_query($conexion,$query);
      $ret=mysqli_fetch_array($result);
      return $ret; 
    }
    
    function evaluar3sql($conexion,$email){
      $query="SELECT (u.pregunta1+u.pregunta2+u.pregunta3+u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10+u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15+u.pregunta16+u.pregunta17+u.pregunta18+u.pregunta19+u.pregunta20+u.pregunta21+u.pregunta22+u.pregunta23+u.pregunta24+u.pregunta25+u.pregunta26+u.pregunta27+u.pregunta28+u.pregunta29+u.pregunta30+u.pregunta31+u.pregunta32+u.pregunta33+u.pregunta34+u.pregunta35+u.pregunta36+u.pregunta37+u.pregunta38+u.pregunta39+u.pregunta40+u.pregunta41+u.pregunta42+u.pregunta43+u.pregunta44+u.pregunta45+u.pregunta46+u.pregunta47+u.pregunta48+u.pregunta49+u.pregunta50+u.pregunta51+u.pregunta52+u.pregunta53+u.pregunta54+u.pregunta55+u.pregunta56+u.pregunta57+u.pregunta58+u.pregunta59+u.pregunta60+u.pregunta61+u.pregunta62+u.pregunta63+u.pregunta64+u.pregunta65+u.pregunta66+u.pregunta67+u.pregunta68+u.pregunta69+u.pregunta70+u.pregunta71+u.pregunta72) as r, (u.pregunta1+u.pregunta3+u.pregunta2+u.pregunta4+u.pregunta5) as r1, (u.pregunta6+u.pregunta12+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10+u.pregunta11+u.pregunta65+u.pregunta66+u.pregunta67+u.pregunta68+u.pregunta13+u.pregunta14+u.pregunta15+u.pregunta16+u.pregunta25+u.pregunta26+u.pregunta27+u.pregunta28+u.pregunta23+u.pregunta24+u.pregunta29+u.pregunta30+u.pregunta35+u.pregunta36) as r2, (u.pregunta17+u.pregunta18+u.pregunta19+u.pregunta20+u.pregunta21+u.pregunta22) as r3, (u.pregunta31+u.pregunta32+u.pregunta33+u.pregunta34+u.pregunta37+u.pregunta38+u.pregunta39+u.pregunta40+u.pregunta41+u.pregunta42+u.pregunta43+u.pregunta44+u.pregunta45+u.pregunta46+u.pregunta69+u.pregunta70+u.pregunta71+u.pregunta72+u.pregunta57+u.pregunta58+u.pregunta59+u.pregunta60+u.pregunta61+u.pregunta62+u.pregunta63+u.pregunta64) as r4, (u.pregunta47+u.pregunta48+u.pregunta49+u.pregunta50+u.pregunta51+u.pregunta52+u.pregunta55+u.pregunta56+u.pregunta53+u.pregunta54) as r5, (u.pregunta2+u.pregunta3) as s1, u.correo as c, (u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10) as s2, (u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15) as s3, m.fecha FROM maincuestionario m INNER JOIN cuestionario3 u ON u.correo=m.correo WHERE m.cuestionario='3' and u.correo='".$email."'";
      $result=mysqli_query($conexion,$query);
      $ret=mysqli_fetch_array($result);
      return $ret; 
    }
    
    function evaluar3sqlE($conexion,$email){
      $query="SELECT (u.pregunta1+u.pregunta2+u.pregunta3+u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10+u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15+u.pregunta16+u.pregunta17+u.pregunta18+u.pregunta19+u.pregunta20+u.pregunta21+u.pregunta22+u.pregunta23+u.pregunta24+u.pregunta25+u.pregunta26+u.pregunta27+u.pregunta28+u.pregunta29+u.pregunta30+u.pregunta31+u.pregunta32+u.pregunta33+u.pregunta34+u.pregunta35+u.pregunta36+u.pregunta37+u.pregunta38+u.pregunta39+u.pregunta40+u.pregunta41+u.pregunta42+u.pregunta43+u.pregunta44+u.pregunta45+u.pregunta46+u.pregunta47+u.pregunta48+u.pregunta49+u.pregunta50+u.pregunta51+u.pregunta52+u.pregunta53+u.pregunta54+u.pregunta55+u.pregunta56+u.pregunta57+u.pregunta58+u.pregunta59+u.pregunta60+u.pregunta61+u.pregunta62+u.pregunta63+u.pregunta64+u.pregunta65+u.pregunta66+u.pregunta67+u.pregunta68+u.pregunta69+u.pregunta70+u.pregunta71+u.pregunta72) as r, (u.pregunta1+u.pregunta3+u.pregunta2+u.pregunta4+u.pregunta5) as r1, (u.pregunta6+u.pregunta12+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10+u.pregunta11+u.pregunta65+u.pregunta66+u.pregunta67+u.pregunta68+u.pregunta13+u.pregunta14+u.pregunta15+u.pregunta16+u.pregunta25+u.pregunta26+u.pregunta27+u.pregunta28+u.pregunta23+u.pregunta24+u.pregunta29+u.pregunta30+u.pregunta35+u.pregunta36) as r2, (u.pregunta17+u.pregunta18+u.pregunta19+u.pregunta20+u.pregunta21+u.pregunta22) as r3, (u.pregunta31+u.pregunta32+u.pregunta33+u.pregunta34+u.pregunta37+u.pregunta38+u.pregunta39+u.pregunta40+u.pregunta41+u.pregunta42+u.pregunta43+u.pregunta44+u.pregunta45+u.pregunta46+u.pregunta69+u.pregunta70+u.pregunta71+u.pregunta72+u.pregunta57+u.pregunta58+u.pregunta59+u.pregunta60+u.pregunta61+u.pregunta62+u.pregunta63+u.pregunta64) as r4, (u.pregunta47+u.pregunta48+u.pregunta49+u.pregunta50+u.pregunta51+u.pregunta52+u.pregunta55+u.pregunta56+u.pregunta53+u.pregunta54) as r5, (u.pregunta2+u.pregunta3) as s1, u.correo as c, (u.pregunta4+u.pregunta5+u.pregunta6+u.pregunta7+u.pregunta8+u.pregunta9+u.pregunta10) as s2, (u.pregunta11+u.pregunta12+u.pregunta13+u.pregunta14+u.pregunta15) as s3, m.fecha FROM maincuestionario m INNER JOIN cuestionario3 u ON u.correo=m.correo WHERE m.cuestionario='3' and u.correo='".$email."'";
      $result=mysqli_query($conexion,$query);
      $ret=mysqli_fetch_array($result);
      return $ret; 
    }
    
    function update($conexion,$query){
        $respuesta=false;
         if($query==null){throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");}
         else{
            $resultado=mysqli_query($conexion,$query);
             if(resultado != null){
                $respuesta=true;}
         }
        return $respuesta;
    }
    
    function actualizar_foto($conexion,$ruta,$email){
         $query = "UPDATE usuarios SET foto='".$ruta."' WHERE correo='".$email."'";  
         mysqli_query($conexion, $query) or die ("falla en la query");  
    }
    
}
