<?php
	require "../modelo/conexion.php";
	$sql="SELECT m.Lmaint,sum(m.Cost) as puntero,d.Brand from maintenance as m inner join devices as d on m.IDdiv=d.IDd where d.Brand='1' GROUP by Lmaint order by Lmaint";
	$result=mysqli_query($conexion,$sql);

    $valoresY=array();
	$valoresX=array();

    while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

    $datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

    $sql2="SELECT m.Lmaint,sum(m.Cost) as puntero,d.Brand from maintenance as m inner join devices as d on m.IDdiv=d.IDd where d.Brand='2' GROUP by Lmaint order by Lmaint";
	$result2=mysqli_query($conexion,$sql2);

	$valoresY=array();
	$valoresX=array();

	while ($ver=mysqli_fetch_row($result2)) {
		$valoresY2[]=$ver[1];
		$valoresX2[]=$ver[0];
	}

    $datosX2=json_encode($valoresX2);
	$datosY2=json_encode($valoresY2);

    $sql3="SELECT m.Lmaint,sum(m.Cost) as puntero,d.Brand from maintenance as m inner join devices as d on m.IDdiv=d.IDd where d.Brand='3' GROUP by Lmaint order by Lmaint";
	$result3=mysqli_query($conexion,$sql3);

	$valoresY3=array();
	$valoresX3=array();

	while ($ver=mysqli_fetch_row($result3)) {
		$valoresY3[]=$ver[1];
		$valoresX3[]=$ver[0];
	}

    $datosX3=json_encode($valoresX3);
	$datosY3=json_encode($valoresY3);

    $sql4="SELECT m.Lmaint,sum(m.Cost) as puntero,d.Brand from maintenance as m inner join devices as d on m.IDdiv=d.IDd where d.Brand='4' GROUP by Lmaint order by Lmaint";
	$result4=mysqli_query($conexion,$sql4);

	$valoresY4=array();
	$valoresX4=array();

	while ($ver=mysqli_fetch_row($result4)) {
		$valoresY4[]=$ver[1];
		$valoresX4[]=$ver[0];
	}

    $datosX4=json_encode($valoresX4);
	$datosY4=json_encode($valoresY4);

    $sql5="SELECT m.Lmaint,sum(m.Cost) as puntero,d.Brand from maintenance as m inner join devices as d on m.IDdiv=d.IDd where d.Brand='5' GROUP by Lmaint order by Lmaint";
	$result5=mysqli_query($conexion,$sql5);

	$valoresY5=array();
	$valoresX5=array();

	while ($ver=mysqli_fetch_row($result5)) {
		$valoresY5[]=$ver[1];
		$valoresX5[]=$ver[0];
	}

    $datosX5=json_encode($valoresX5);
	$datosY5=json_encode($valoresY5);

    $sql6="SELECT m.Lmaint,sum(m.Cost) as puntero,d.Brand from maintenance as m inner join devices as d on m.IDdiv=d.IDd where d.Brand='6' GROUP by Lmaint order by Lmaint";
	$result6=mysqli_query($conexion,$sql6);

	$valoresY6=array();
	$valoresX6=array();

	while ($ver=mysqli_fetch_row($result6)) {
		$valoresY6[]=$ver[1];
		$valoresX6[]=$ver[0];
	}

    $datosX6=json_encode($valoresX6);
	$datosY6=json_encode($valoresY6);

	$sql7="SELECT m.Lmaint,sum(m.Cost) as puntero,d.Brand from maintenance as m inner join devices as d on m.IDdiv=d.IDd where d.Brand='7' GROUP by Lmaint order by Lmaint";
	$result7=mysqli_query($conexion,$sql7);

	$valoresY7=array();
	$valoresX7=array();

	while ($ver=mysqli_fetch_row($result7)) {
		$valoresY7[]=$ver[1];
		$valoresX7[]=$ver[0];
	}

    $datosX7=json_encode($valoresX7);
	$datosY7=json_encode($valoresY7);
 ?>

<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');
    
    datosX2=crearCadenaBarras('<?php echo $datosX2 ?>');
	datosY2=crearCadenaBarras('<?php echo $datosY2 ?>');
    
    datosX3=crearCadenaBarras('<?php echo $datosX3 ?>');
	datosY3=crearCadenaBarras('<?php echo $datosY3 ?>');
    
    datosX4=crearCadenaBarras('<?php echo $datosX4 ?>');
	datosY4=crearCadenaBarras('<?php echo $datosY4 ?>');
    
    datosX5=crearCadenaBarras('<?php echo $datosX5 ?>');
	datosY5=crearCadenaBarras('<?php echo $datosY5 ?>');
    
    datosX6=crearCadenaBarras('<?php echo $datosX6 ?>');
	datosY6=crearCadenaBarras('<?php echo $datosY6 ?>');
    
    datosX7=crearCadenaBarras('<?php echo $datosX7 ?>');
	datosY7=crearCadenaBarras('<?php echo $datosY7 ?>');
    
    /*
    var trace1=[
        {
        x:datosX,
        y:datosY,
        name: 'yaxis data',
        type:'scatter'
        }
    ];
    
    var trace2=[
        {
        x:datosX2,
        y:datosY2,
        name: 'yaxis2 data',
        type:'scatter'
        }
    ];
    
    var data=[trace1, trace2];
    
    var layout = {
  title: 'Double Y Axis Example',
  yaxis: {title: 'yaxis title'},
  yaxis2: {
    title: 'yaxis2 title',
    titlefont: {color: 'rgb(148, 103, 189)'},
    tickfont: {color: 'rgb(148, 103, 189)'},
    overlaying: 'y',
    side: 'right'
  }
};

	Plotly.newPlot('graficaBarras', data,layout);*/
    
var trace1 = {
  x: datosX,
  y: datosY,
  name: 'OTROS',
  type: 'scatter',
  marker:{
    color:'#000000'
  }
};

var trace2 = {
  x: datosX2,
  y: datosY2,
  name: 'SAMSUNG',
  type: 'scatter',
  marker:{
    color:'#3e45ff'
  }
};

var trace3 = {
  x: datosX3,
  y: datosY3,
  name: 'KOOLATRON',
  type: 'scatter',
  marker:{
    color:'#09f524'
  }
};
    
var trace4 = {
  x: datosX4,
  y: datosY4,
  name: 'PHILIPS',
  type: 'scatter',
  marker:{
    color:'#5e8362'
  }
};
    
var trace5 = {
  x: datosX5,
  y: datosY5,
  name: 'MABE',
  type: 'scatter',
  marker:{
    color:'#a7e8d9'
  }
};

var trace6 = {
  x: datosX6,
  y: datosY6,
  name: 'CARRIER',
  type: 'scatter',
  marker:{
    color:'#e01ae8'
  }
};
    
var trace7 = {
  x: datosX7,
  y: datosY7,
  name: 'PANASONIC',
  type: 'scatter',
  marker:{
    color:'#e8711a'
  }
};

var data = [trace1, trace2, trace3, trace4, trace5, trace6, trace7];

var layout = {
  title: 'Costos de Mantenimiento por Marcas',
  yaxis: {title: 'Fallas'},
  yaxis2: {
    title: 'Costo $MXM',
    titlefont: {color: 'rgb(0, 0, 0)'},
    tickfont: {color: 'rgb(0, 0, 0)'},
    overlaying: 'y',
    side: 'right'
  }
};

Plotly.newPlot('graficaBarras', data, layout);
    
</script>