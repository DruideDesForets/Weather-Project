<!DOCTYPE HTML>
<html>
  <h1>CAVE</h1>

        <script type='text/javascript' src="../Highcharts-5-2/code/highcharts.js"></script>
        <script type='text/javascript' src="../jquery.js"></script>
        <script type='text/javascript' src="../Highcharts-5-2/code/modules/exporting.js"></script>

	<a href = "../index.php"><p>retour menu</p></a>

	<?php include '../switches.php'; ?>
	
        <div id="container_pressure_cave" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<?php include 'pressure_cave.php'; ?>
	
	<div id="container_temperature_cave" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<?php include 'temperature_cave.php'; ?>
	
	<div id="container_humidity_cave" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<?php include 'humidity_cave.php'; ?>

	

</html>
