<!DOCTYPE HTML>
<html>
  <body id="house">
   <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css">
  </head>
  <script type='text/javascript' src="../Highcharts-5-2/code/highcharts.js"></script>
  <script type='text/javascript' src="../jquery.js"></script>
  <script src="../Highcharts-5-2/code/highcharts-more.js"></script>
  <script type='text/javascript' src="../Highcharts-5-2/code/modules/exporting.js"></script>
  <?php include '../skeleton.php'; ?>
  
  <div id="container">
    <section class="container">
      <h1>HOUSE</h1>
      <div id="container_values">
	<div id="temp_value"></div>
	<div id="press_value"></div>
	  <?php include 'actual_pressure.php'; ?>
	<div id="hum_value"></div>
      </div>
      
      <div id="container_pressure_maison" class="container_chart"></div>
      <?php include 'pressure_maison.php'; ?>
      
      <div id="container_temperature_maison" class="container_chart"></div>
      <?php include 'temperature_maison.php'; ?>
      
      <div id="container_humidity_maison" class="container_chart"></div>
      <?php include 'humidity_maison.php'; ?>
    
  </section>

  </div>
  </body>

</html>
