
<?php


    
try
{
	$bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','sensor_station','');
}
catch(Exception $e)
{
	die('Error: '.$e->getMessage());
}
$req_cave=$bdd->query('SELECT pressure, YEAR(date) AS year, MONTH(date) AS month, DAY(date) AS day, HOUR(date) AS hour, MINUTE(date) AS minute FROM cave');
$n_cave=$bdd->query('SELECT COUNT(*) AS n FROM cave');

echo '<script>';

echo 'var cave = [';
$i=0;
$n=$n_cave->fetch();
while($donnees=$req_cave->fetch()){
    $i++;
    echo '[Date.UTC('.$donnees['year'].','.$donnees['month'].','.$donnees['day'].','.$donnees['hour'].','.$donnees['minute'].'),'.$donnees['pressure'].']';
    if ($i != $n){
	echo ', ';
    }
}
echo '];';


    ?>
    Highcharts.chart('container_pressure_cave', {
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Pressure'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                    'Select and drag to zoom' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'Pressure'
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
                        [0, Highcharts.getOptions().colors[2]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[2]).setOpacity(0).get('rgba')]
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
            name: 'cave',
            data: cave,
            color: 'green'
        }]
                     
                     
    });



</script>
