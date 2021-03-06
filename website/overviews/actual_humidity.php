
    <?php



try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
$req=$bdd->query('SELECT COUNT(*) as n FROM '.$select['name'].' WHERE humidity IS NOT NULL');
$d=$req->fetch();
$req=$bdd->query('SELECT humidity FROM '.$select['name'].' WHERE id='.$d['n']);
$humidity=$req->fetch();
$req->closeCursor();
    ?>
    <script>
    Highcharts.chart('hum_value', {

	chart: {
            type: 'gauge',
	    backgroundColor: '#546B85',
            plotBorderWidth: 0,
            plotShadow: false
	},

	title: {
            text: 'Humidity',
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
            min: 0,
            max: 100,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
		step: 2,
		rotation: 'auto'
            },
            title: {
		text: 'Humidity'
            },
            plotBands: [{
			    from: 0,
			    to: 33,
			    color: '#bddbf6'
			},
			{
			    from: 33,
			    to: 67,
			    color: '#96c2ea'
			},
			{
			    from: 67,
			    to: 100,
			    color: '#589fe1'
			}]
	},

	series: [{
            name: 'Humidity',
            data: [<?php echo $humidity['humidity']; ?>],
            tooltip: {
		valueSuffix: ' %'
            }
	}]

    }
);

</script>

