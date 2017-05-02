
    <?php



try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
$req=$bdd->query('SELECT COUNT(*) as n FROM '.$select['name'].' WHERE pressure IS NOT NULL');
$d=$req->fetch();
$req=$bdd->query('SELECT pressure FROM '.$select['name'].' WHERE id='.$d['n']);
$pressure=$req->fetch();
$req->closeCursor();
    ?>
    <script>
    Highcharts.chart('press_value', {

	chart: {
            type: 'gauge',
	    backgroundColor: '#546B85',
            plotBorderWidth: 0,
            plotShadow: false
	},

	title: {
            text: 'Barometer',
	    	style: {
		color: 'white',
		textTransform: 'uppercase',
		fontSize: '30px'	
	    }
	},

	pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
		backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
			[0, '#FFF'],
			[1, '#333']
                    ]
		},
		borderWidth: 0,
		outerRadius: '109%'
            }, {
		backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
			[0, '#333'],
			[1, '#FFF']
                    ]
		},
		borderWidth: 1,
		outerRadius: '107%'
            }, {
		// default background
            }, {
		backgroundColor: '#DDD',
		borderWidth: 0,
		outerRadius: '105%',
		innerRadius: '103%'
            }]
	},

	// the value axis
	yAxis: {
            min: 940,
            max: 1010,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'outside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
		step: 2,
		rotation: 'auto'
            },
            title: {
		text: 'Millibars'
            },
            plotBands: []
	},

	series: [{
            name: 'Pressure',
            data: [<?php echo $pressure['pressure']; ?>],
            tooltip: {
		valueSuffix: ' mb'
            }
	}]

    }
);

</script>

