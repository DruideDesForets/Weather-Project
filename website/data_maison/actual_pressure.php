
    <?php



try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','sensor_station','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
$req=$bdd->query('SELECT pressure FROM maison WHERE id=1');
$donnee=$req->fetch();
    ?>
    <script>
    Highcharts.chart('press_value', {

	chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
	},

	title: {
            text: 'Barometer'
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
            min: 980,
            max: 1010,

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
		text: 'Millibars'
            },
            plotBands: [{
		from: 980,
		to: 985,
		color: '#55FF0C' // green
            },
			{
			    from: 985,
			    to: 990,
			    color: '#9DFF0C' // green
			},
			{
			    from: 990,
			    to: 995,
			    color: '#FFFF0C' // green
			},
			{
			    from: 995,
			    to: 1000,
			    color: '#FFA00C' // green
			},
			{
			    from: 1000,
			    to: 1005,
			    color: '#FF510C' // green
			},
			{
			    from: 1005,
			    to: 1010,
			    color: '#FF000C' // green
			}]
	},

	series: [{
            name: 'Pressure',
            data: [<?php echo $donnee['pressure']; ?>],
            tooltip: {
		valueSuffix: ' mb'
            }
	}]

    }
		    );

</script>

