<?php
	require_once "../modelo/conexion.php";
/*SELECT Lfail,puntero 
			from fails where Sort='2' order by Lfail*/
	$sql="SELECT Lfail,sum(puntero) as puntero from fails where IDD='".$_POST["IDss"]."' group by Lfail order by Lfail";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//montos
	$valoresX=array();//fechas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
 ?>

<div id="graficaBarras2"></div>

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

	var data=[
        {
        x:datosX,
        y:datosY,
        type:'bar',
        marker:{
            color:'#b21a1a'
        }
        }
    ];
    
    var layout={
        title:'Registro de fallas',
        font:{
            family:'Raleway, sans-serif'
        },
        xaxis:{
            title:'Fechas'
        },
        yaxis:{
            title:'Numero de fallas'
        }
    };

	Plotly.newPlot('graficaBarras2', data,layout);
</script>