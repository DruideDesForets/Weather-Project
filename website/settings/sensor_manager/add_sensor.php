
    <?php
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
$req=$bdd->query('SELECT * FROM station_list');
    ?>

<form method="post" action="add_sensor_post.php">
    <label><h3>Add sensors to station</h3></label> <br />
    <p>Which station</p><br>
    <select name="select">
    <?php
    while($donnees=$req->fetch()){
	echo '<option value="'.htmlspecialchars($donnees['name']).'">'.htmlspecialchars($donnees['name']);
	if ($donnees['temperature'] == 1){
	    echo '-temp';
	}
	if ($donnees['pressure'] == 1){
	    echo '-press';
	}
	if ($donnees['humidity'] == 1){
	    echo '-hum';
	}
	echo '</option>';
}
    ?>
    </select>
    <br>
    <br>
    <input type="checkbox" name="temperature" /> <label for="temperature">Temperature</label>
    <br>
    <input type="checkbox" name="pressure" /> <label for="pressure">Pressure</label>
    <br>
    <input type="checkbox" name="humidity" /> <label for="humidity">Humidity</label>
    <br>
    <br>
    <input type="submit" value="Add">
    </form> 
    <br>
