
<?php


    
try
{
	$bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
	die('Error: '.$e->getMessage());
}
$req_temperature=$bdd->query('SELECT temperature, id FROM '.$select['name'].' WHERE temperature IS NOT NULL');
$n_temperature=$bdd->query('SELECT COUNT(*) AS n FROM '.$select['name'].' WHERE temperature IS NOT NULL');

echo '<script>';

echo 'var temperature = [';
$i=0;
$n=$n_temperature->fetch();
while($data=$req_temperature->fetch()){
    $i++;
    echo '['.$data['id'].','.$data['temperature'].']';
    if ($i != $n){
	echo ', ';
    }
}
echo '];';
$req_temperature->closeCursor();

    ?>
    Highcharts.chart('container_temperature', {
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Temperature'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                    'Select and drag to zoom' : 'Pinch the chart to zoom in'
        },
        yAxis: {
            title: {
                text: 'Temperature'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[5]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[6]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'temperature',
            data: temperature,
            color: 'purple'
	    }]
                     
                     
    });



</script>

