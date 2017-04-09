<!DOCTYPE HTML>
<html>
  <h1>JARDIN</h1>
        <script type='text/javascript' src="../Highcharts-5-2/code/highcharts.js"></script>
        <script type='text/javascript' src="../jquery.js"></script>
        <script type='text/javascript' src="../Highcharts-5-2/code/modules/exporting.js"></script>

	<a href = "../index.php"><p>retour menu</p></a>

	<?php include '../switches.php'; ?>
	
        <div id="container_pressure_jardin" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<?php include 'pressure_jardin.php'; ?>
	
	<div id="container_temperature_jardin" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<?php include 'temperature_jardin.php'; ?>
	
	<div id="container_humidity_jardin" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<?php include 'humidity_jardin.php'; ?>

	

</html>
