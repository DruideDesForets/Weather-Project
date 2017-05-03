
<?php


    
try
{
	$bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
	die('Error: '.$e->getMessage());
}
$req_pressure=$bdd->query('SELECT pressure, id FROM '.$select['name'].' WHERE pressure IS NOT NULL');
$n_pressure=$bdd->query('SELECT COUNT(*) AS n FROM '.$select['name'].' WHERE pressure IS NOT NULL');

echo '<script>';

echo 'var pressure = [';
$i=0;
$n=$n_pressure->fetch();
while($data=$req_pressure->fetch()){
    $i++;
    echo '['.$data['id'].','.$data['pressure'].']';
    if ($i != $n){
	echo ', ';
    }
}
echo '];';
$req_pressure->closeCursor();

    ?>
    Highcharts.chart('container_pressure', {
        chart: {
            zoomType: 'x',
	    backgroundColor: '#546B85'
        },
        title: {
            text: 'pressure',
	    style: {
             color: 'white',
             textTransform: 'uppercase',
             fontSize: '50px'
	 }

        },
        yAxis: {
            title: {
                text: 'Pressure',
		style: {
		    color: 'white',
		    fontSize: '20px'
		}
            },
	    labels: {
		style: {
		    color: 'white',
		    fontSize: '20px'
		}
	    }
	
	},
	xAxis: {
            title: {
                text: 'Steps',
		style: {
		    color: 'white',
		    fontSize: '20px'
		}
            },
	    labels: {
		style: {
		    color: 'white',
		    fontSize: '20px'
		}
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
                        [1, Highcharts.Color(Highcharts.getOptions().colors[1]).setOpacity(0).get('rgba')]
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
            name: 'pressure',
            data: pressure,
            color: 'green'
	    }]
                     
                     
    });



</script>
