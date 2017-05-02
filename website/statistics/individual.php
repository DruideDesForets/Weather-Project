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

if (isset($_GET['name'])){
    $req_s=$bdd->prepare('SELECT * FROM station_list WHERE name=?');
    $req_s->execute(array($_GET['name']));
    $select = $req_s->fetch();
    $req_s->closeCursor();
    include '../skeleton.php';
echo '<h1 id="title">'.$_GET['name'].'</h1>';
    ?>  
    <div id="container">
    <section class="container">
      <?php
	 if($select['temperature']==0 && $select['pressure']==0 && $select['humidity']==0){
	    echo '<p>No sensor for this station</p>';
	 }
    else{
	     echo '<div id="individual_stat">';
	     if ($select['temperature'] ==1){
echo '<div id="container_individual_temp"></div>';
		 include 'individual_temp_boxplot.php';
	     }
	if ($select['pressure'] == 1){ 
echo '<div id="container_individual_press" ></div>';
	    include 'individual_press_boxplot.php';
	}
	     
	if ($select['humidity'] == 1){  
echo '<div id="container_individual_hum"></div>';
include 'individual_hum_boxplot.php';
	}

    echo '</div>';
	 }
	 }
    ?>
</section>
    </div>
