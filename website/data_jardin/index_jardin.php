<!DOCTYPE HTML>
<html>
  <body id="garden">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../style.css">
    </head>

    <script type='text/javascript' src="../Highcharts-5-2/code/highcharts.js"></script>
    <script type='text/javascript' src="../jquery.js"></script>
    <script type='text/javascript' src="../Highcharts-5-2/code/modules/exporting.js"></script>
    <?php include '../skeleton.php'; ?>
    
    <div id="container">
      <section class="container">
        <h1>GARDEN</h1>
        <div id="container_pressure_jardin" class="container_chart"></div>
	<?php include 'pressure_jardin.php'; ?>
	
	<div id="container_temperature_jardin" class="container_chart"></div>
	<?php include 'temperature_jardin.php'; ?>
	
	<div id="container_humidity_jardin" class="container_chart"></div>
	<?php include 'humidity_jardin.php'; ?>

  </body>	

</html>
