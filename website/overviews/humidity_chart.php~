
<?php


    
try
{
	$bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
	die('Error: '.$e->getMessage());
}
$req_humidity=$bdd->query('SELECT humidity, id FROM '.$select['name']);
$n_humidity=$bdd->query('SELECT COUNT(*) AS n FROM '.$select['name']);


echo '<script>';

echo 'var humidity = [';
$i=0;
$n=$n_humidity->fetch();
while($data=$req_humidity->fetch()){
    $i++;
    echo '['.$data['id'].','.$data['humidity'].']';
    if ($i != $n){
	echo ', ';
    }
}
echo '];';
$req_humidity->closeCursor();

    ?>
    Highcharts.chart('container_humidity', {
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Humidity'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                    'Select and drag to zoom' : 'Pinch the chart to zoom in'
        },
        yAxis: {
            title: {
                text: 'Humidity'
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
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
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
            name: 'humidity',
            data: humidity,
            color: 'blue'
     }]      
                     
    });

</script>
