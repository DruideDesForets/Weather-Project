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
$temperature=0;
$pressure=0;
$humidity=0;
if (isset($_POST['temperature']) && $_POST['temperature'] == 'on'){
   $temperature=1;
   }

if (isset($_POST['pressure']) && $_POST['pressure'] == 'on'){
    $pressure=1;
}

if (isset($_POST['humidity']) && $_POST['humidity'] == 'on'){
    $humidity=1;
}
$already_exist=0;

if (isset($_POST['name'])){
    $req0=$bdd->query('SELECT name FROM station_list');
    while ($select=$req0->fetch()){
	if(strcmp($select['name'], $_POST['name']) == 0){
	    $already_exist=1;
	    break;
	}
    }
    if ($already_exist==0){    
	$req1=$bdd->query('CREATE TABLE '.$_POST['name'].' (id INT PRIMARY KEY AUTO_INCREMENT, date DATETIME, temperature DECIMAL(4,2), pressure DECIMAL(6,2), humidity DECIMAL(4,2))');


	$req=$bdd->prepare('INSERT INTO station_list(name, temperature, pressure, humidity, frequency) VALUES (:name, :temperature, :pressure, :humidity, :frequency)');
	$req->execute(array(
	    'name' => $_POST['name'],
	    'temperature' => $temperature,
	    'pressure' => $pressure,
	    'humidity' => $humidity,
	    'frequency' => $_POST['frequency']
	));
	$req->closeCursor();
	$req1->closeCursor();
	header('location:index.php');
    }
    else
    {
	echo '<h2>this station already exists</h2>';
    }
}

    ?>

  </body>
</html>
