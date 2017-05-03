    <?php 
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}

echo '<script>';

$req2=$bdd->query('SELECT COUNT(*) AS n FROM '.$_GET['name'].' WHERE pressure IS NOT NULL');
$n=$req2->fetch();
$req2->closeCursor();
$quartile = (int) ($n['n']/4);

$req_min_max=$bdd->query('SELECT MIN(pressure) as min, MAX(pressure) as max FROM '.$_GET['name'].' WHERE pressure IS NOT NULL');


$req_avg = $bdd->query('SELECT AVG(pressure) AS avg FROM '.$_GET['name'].' WHERE pressure IS NOT NULL');
$array_avg=$req_avg->fetch();
$avg=round($array_avg['avg'], 2);

$req_quartiles = $bdd->query('SELECT pressure FROM '.$_GET['name'].' WHERE pressure IS NOT NULL ORDER BY pressure');


echo 'var stat = [';

$min_max=$req_min_max->fetch();//min
echo '['.$min_max['min'].', ';

for ($i=0; $i<$quartile; $i++){//premier quartile
    $d=$req_quartiles->fetch();}
echo $d['pressure'].', ';

for ($i=0; $i<$quartile; $i++){//second quartile
    $d=$req_quartiles->fetch();}
echo $d['pressure'].', ';

for ($i=0; $i<$quartile; $i++){//trosieme quartile
    $d=$req_quartiles->fetch();}
echo $d['pressure'].', ';

echo $min_max['max'].']]; ';//max
?>
Highcharts.chart('container_individual_press', {
    colors: ['#66C56C'],
    chart: {
        type: 'boxplot',
        backgroundColor: {
         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
            stops: [[0,'#546B85'],
            [1, '#546B85']
         ]
    }
    },
    plotOptions: {
	boxplot: {
            fillColor: '#546B85'
	}
    },

    title: {
        text: 'Pressure',
	 style: {
             color: 'white',
             textTransform: 'uppercase',
             fontSize: '30px'
	 }
    },

    legend: {
        enabled: false
    },

    xAxis: {
        categories: [<?php echo '\''.$_GET['name'].'\''; ?>],
	labels: {
	    style: {
		color: 'white',
		fontSize: '20px'
	    }
        }
    },

    yAxis: {
        title: {
            text: 'Observations',
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
        },
        plotLines: [{
            value: <?php echo $avg; ?>,
            color: 'red',
            width: 1,
            label: {
                text: <?php echo '\'avg:'.$avg.'\''; ?>,
                style: {
                    color: 'white',
		    fontSize: '20px'
                }
            }
        }]
    },

    series: [{
        name: 'Observations',
        data: stat,
        tooltip: {
            headerFormat: '<em>{point.key}</em><br/>'
        }
    }]

});
	

</script>
