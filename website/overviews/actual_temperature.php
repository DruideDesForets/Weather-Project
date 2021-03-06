
    <?php



try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
$req=$bdd->query('SELECT COUNT(*) as n FROM '.$select['name'].' WHERE temperature IS NOT NULL');
$d=$req->fetch();
$req=$bdd->query('SELECT temperature FROM '.$select['name'].' WHERE id='.$d['n']);
$temperature=$req->fetch();
$req->closeCursor();
    ?>
    <script>
    Highcharts.chart('temp_value', {

	chart: {
            type: 'gauge',
	    backgroundColor: '#546B85',
            plotBorderWidth: 0,
            plotShadow: false
	},

	title: {
            text: 'Thermometer',
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
            max: 40,

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
		text: 'Temperature'
            },
            plotBands: [{
		from: 0,
		to: 5,
		color: '#e2effd'
            },
			{
			    from: 5,
			    to: 10,
			    color: '#9ed5f0' 
			},
			{
			    from: 10,
			    to: 15,
			    color: '#b7f6a9' 
			},
			{
			    from: 15,
			    to: 20,
			    color: '#abf048'
			},
			{
			    from: 20,
			    to: 25,
			    color: '#d3f650'
			},
			{
			    from: 25,
			    to: 30,
			    color: '#ecb229'
			},
			{
			    from: 30,
			    to: 35,
			    color: '#f69431'
			},
			
			{
			    from: 35,
			    to: 40,
			    color: '#ee3e1f'
			}


		       ]
	},

	series: [{
            name: 'Temperature',
            data: [<?php echo $temperature['temperature']; ?>],
            tooltip: {
		valueSuffix: ' °C'
            }
	}]

    }
);

</script>

