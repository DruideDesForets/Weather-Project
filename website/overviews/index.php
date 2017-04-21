    <!DOCTYPE HTML>
    <html>
    <body>
    <?php 
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
if(isset($_GET['name'])){
    $req=$bdd->prepare('SELECT * FROM station_list WHERE name=?');
    $req->execute(array($_GET['name']));
    $select = $req->fetch();
    $req->closeCursor();
    include '../skeleton.php';
    echo '<h1>'.$select['name'].'</h1>';
	?>

    
	<div id="container">
	<section class="container">
	<?php if($select['temperature']==0 && $select['pressure']==0 && $select['humidity']==0){
	    echo '<p>No sensor for this station</p>';
	}
    else{
	
	echo '<h2>Latest measures</h2>';
	echo '<div id="container_values">';
	
	if ($select['temperature'] ==1){
	    echo '<div id="temp_value"></div>';
	    include 'actual_temperature.php';
	}
	if ($select['pressure'] == 1){   
	    echo '<div id="press_value"></div>';
	    include 'actual_pressure.php';
	}
	if ($select['humidity'] == 1){  	
	    echo' <div id="hum_value"></div>';
	    include 'actual_humidity.php';
	}
	echo '</div><h2>History</h2><div id="history">';
	
	if ($select['temperature'] == 1){
	    echo '<div id="container_temperature" class="container_chart"></div>';
	    include 'temperature_chart.php';
	}
	if ($select['pressure'] == 1){
	    echo '<div id="container_pressure" class="container_chart"></div>';
	    include 'pressure_chart.php';
	}
	if ($select['humidity'] == 1){	    
	    echo '<div id="container_humidity" class="container_chart"></div>';
	    include 'humidity_chart.php';
	}
	echo '</div>';
	    ?>
	    </section>
	    </div>
	    </body>
	    </html>
	    <?php
    }
    echo'</section></div></body></html>';
}
else{
    header('location:../index.php');
}
    ?>
