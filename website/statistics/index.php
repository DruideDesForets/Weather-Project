    <!DOCTYPE HTML>
    <html>
    <body>
    <?php 

include '../skeleton.php';
echo '<h1 id="title">Statistics</h1>';
    ?>  
    <div id="container">
    <section class="container">
      <?php
echo '<div id="stat">';
echo '<div id="container_stat_temp" class="container_boxplot"></div>';
include 'temp_boxplot.php';

echo '<div id="container_stat_press" class="container_boxplot"></div>';
include 'press_boxplot.php';

echo '<div id="container_stat_hum" class="container_boxplot"></div>';
include 'hum_boxplot.php';

echo '</div>';
    ?>
</section>
    </div>
