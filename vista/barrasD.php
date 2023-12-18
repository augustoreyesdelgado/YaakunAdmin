<?php
	require "../modelo/conexion.php";
	$sql="SELECT Lmaint,sum(puntero) as puntero from maintenance where IDdiv='".$_POST["IDss"]."' group by Lmaint order by Lmaint";
	$result=mysqli_query($conexion,$sql);

    $valoresY=array();
	$valoresX=array();

    while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

    $datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

    $sql2="SELECT Lmaint,sum(Cost) as Cost from maintenance where IDdiv='".$_POST["IDss"]."' group by Lmaint order by Lmaint";
	$result2=mysqli_query($conexion,$sql2);

	$valoresY=array();
	$valoresX=array();

	while ($ver=mysqli_fetch_row($result2)) {
		$valoresY2[]=$ver[1];
		$valoresX2[]=$ver[0];
	}

    $datosX2=json_encode($valoresX2);
	$datosY2=json_encode($valoresY2);

	
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
	datosY2=crearCadenaBarras('<?php echo $datosY2 ?>');/*
    
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
  name: 'Reportes',
  type: 'bar',
  marker:{
    color:'#1a2cb2'
  }
};

var trace2 = {
  x: datosX2,
  y: datosY2,
  name: '$MXM',
  yaxis: 'y2',
  type: 'scatter',
  marker:{
    color:'#f50909'
  }
};

var data = [trace1, trace2];

var layout = {
  title: 'Mantenimientos y Costos',
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