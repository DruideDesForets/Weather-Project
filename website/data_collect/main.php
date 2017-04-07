<p>hu</p>
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

$req_jardin=$bdd->query('SELECT temperature, YEAR(date) AS year, MONTH(date) AS month, DAY(date) AS day, HOUR(date) AS hour, MINUTE(date) AS minute FROM jardin');
$n_jardin=$bdd->query('SELECT COUNT(*) AS n FROM jardin');

$req_veranda=$bdd->query('SELECT temperature, YEAR(date) AS year, MONTH(date) AS month, DAY(date) AS day, HOUR(date) AS hour, MINUTE(date) AS minute FROM veranda');
$n_veranda=$bdd->query('SELECT COUNT(*) AS n FROM veranda');

$req_cave=$bdd->query('SELECT temperature, YEAR(date) AS year, MONTH(date) AS month, DAY(date) AS day, HOUR(date) AS hour, MINUTE(date) AS minute FROM cave');
$n_cave=$bdd->query('SELECT COUNT(*) AS n FROM cave');


echo '<p id="liste"></p><script>';

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

    echo 'document.getElementById("liste").innerHTML = maison;';

//creation variable jardin en js
echo 'var jardin = [';
$i=0;
$n=$n_jardin->fetch();
while($donnees=$req_jardin->fetch()){
    $i++;
    echo '[Date.UTC('.$donnees['year'].','.$donnees['month'].','.$donnees['day'].','.$donnees['hour'].','.$donnees['minute'].'),'.$donnees['temperature'].']';
    if ($i < $n){
	echo ', ';
    }
}
echo '];';

/*
//creation variable jardin en js
echo 'var jardin = [';
$i=0;
$n=$n_jardin->fetch();
while($donnees=$req_jardin->fetch()){
    $i++;
    echo '[Date.UTC('.$donnees['year'].','.$donnees['month'].','.$donnees['day'].','.$donnees['hour'].','.$donnees['minute'].'),'.$donnees['temperature'].']';
    if ($i < $n){
	echo ', ';
    }
}
echo '];';

//creation variable jardin en js
echo 'var jardin = [';
$i=0;
$n=$n_jardin->fetch();
while($donnees=$req_jardin->fetch()){
    $i++;
    echo '[Date.UTC('.$donnees['year'].','.$donnees['month'].','.$donnees['day'].','.$donnees['hour'].','.$donnees['minute'].'),'.$donnees['temperature'].']';
    if ($i < $n){
	echo ', ';
    }
}
echo '];';


/*

var_dump($jardin_sql);echo '<br>';
var_dump($jardin_sql);echo '<br>';
var_dump($veranda_sql);echo '<br>';
var_dump($cave_sql);echo '<br>';


    ?>
    <script type="text/javascript">

    <?php

for ($i = 0; $i < count($jardin_sql); ++$i){
    echo 'Date.UTC('.
}
    ?>
    
/*
var convertDate = function(json) {
    
    var veranda = json["veranda"];
    var jardin = json["jardin"];
    var jardin = json["jardin"];
    var cave = json["cave"];

    for(var i = 0; i < veranda.length; i++) {
        var y = veranda[i][0];
        var m = veranda[i][1];
        var d = veranda[i][2];
        var v = veranda[i][3];
        veranda[i] = [Date.UTC(y, m, d), v];
        
        var y = jardin[i][0];
        var m = jardin[i][1];
        var d = jardin[i][2];
        var v = jardin[i][3];
        jardin[i] = [Date.UTC(y, m, d), v];
        
        var y = jardin[i][0];
        var m = jardin[i][1];
        var d = jardin[i][2];
        var v = jardin[i][3];
        jardin[i] = [Date.UTC(y, m, d), v];
        
        var y = cave[i][0];
        var m = cave[i][1];
        var d = cave[i][2];
        var v = cave[i][3];
        cave[i] = [Date.UTC(y, m, d), v];
    }
}

var jardin = .json_encode();

*/
    ?>
    Highcharts.chart('container', {
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Temperature of the room'
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
            name: 'a',
            data: maison,
            color: 'red'
        }/*

	,{
            type: 'area',
            name: 'b',
            data: jardin,
            color: 'green'
        }*/]
    });/*,{
            type: 'area',
            name: 'b',
            data: data["jardin"],
            color: 'red'
        },{
            type: 'area',
            name: 'c',
            data: data["jardin"],
            color: 'red'
        },{
            type: 'area',
            name: 'd',
            data: data["cave"],
            color: 'red'
        }]
                     
                     

    });

    */
</script>

