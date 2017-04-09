
<?php


    
try
{
	$bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','sensor_station','');
}
catch(Exception $e)
{
	die('Error: '.$e->getMessage());
}
$req_maison=$bdd->query('SELECT temperature, YEAR(date) AS year, MONTH(date) AS month, DAY(date) AS day, HOUR(date) AS hour, MINUTE(date) AS minute FROM maison');
$n_maison=$bdd->query('SELECT COUNT(*) AS n FROM maison');

echo '<script>';

echo 'var maison = [';
$i=0;
$n=$n_maison->fetch();
while($donnees=$req_maison->fetch()){
    $i++;
    echo '[Date.UTC('.$donnees['year'].','.$donnees['month'].','.$donnees['day'].','.$donnees['hour'].','.$donnees['minute'].'),'.$donnees['temperature'].']';
    if ($i != $n){
	echo ', ';
    }
}
echo '];';


    ?>
    Highcharts.chart('container_temperature_maison', {
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
        xAxis: {
            type: 'datetime'
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
            name: 'maison',
            data: maison,
            color: 'purple'
	    }]
                     
                     
    });



</script>

