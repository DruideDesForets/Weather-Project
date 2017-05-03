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
/*-----------------VAR STATIONS---------------*/
$req_press=$bdd->query('SELECT * FROM station_list WHERE pressure = 1');
echo 'var stations = [';

while($stations_press=$req_press->fetch()){
    echo '\''.$stations_press['name'].'\',';
}
echo '];';
$req_press->closeCursor();

/*-----------------DATA---------------*/
$req_press=$bdd->query('SELECT * FROM station_list WHERE pressure = 1');
echo 'var stat = [';
$global_avg = 0;
$cpt_avg = 0;
while($stations_press=$req_press->fetch()){
    $cpt_avg++;
    $req2=$bdd->query('SELECT COUNT(*) AS n FROM '.$stations_press['name'].' WHERE pressure IS NOT NULL');
    $n=$req2->fetch();
    $req2->closeCursor();
    $quartile = (int) ($n['n']/4);

    
    $req_quartiles = $bdd->query('SELECT pressure FROM '.$stations_press['name'].' WHERE pressure IS NOT NULL ORDER BY pressure');
    $req_min_max = $bdd->query('SELECT MIN(pressure) AS min, MAX(pressure) AS max FROM '.$stations_press['name']);
    $req_avg = $bdd->query('SELECT AVG(pressure) AS avg FROM '.$stations_press['name']);
    $avg=$req_avg->fetch();
    
    $global_avg = $global_avg + $avg['avg'];//moyenne
    
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

    echo $min_max['max'].'], ';
 
}
echo '];';

$global_avg=$global_avg/$cpt_avg;
$global_avg= round($global_avg, 2);
echo 'var average = '.$global_avg.';';
?>
Highcharts.chart('container_stat_press', {
    colors: ['#00ff6b'],
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
             fontSize: '50px'
	 }
    },

    legend: {
        enabled: false
    },

    xAxis: {
        categories: stations,
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
            value: average,
            color: 'red',
            width: 1,
            label: {
                text: <?php echo '\'global average : '.$global_avg.'\''; ?>,
                align: 'right',
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
