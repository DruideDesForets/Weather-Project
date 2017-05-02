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
    <ul class="nav">
    
    <li><a href="/website/index.php">Home</a></li>
    
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Overviews</a>
    <div class="dropdown-content">
    <?php
while($donnees=$req->fetch()){
    echo '<a href = "/website/overviews/index.php?name='.$donnees['name'].'">'.$donnees['name'].'</a>';
}
?>
    </div>
    </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Statistics</a>
    <div class="dropdown-content">
    <a href="/website/statistics/index.php">Global</a>
    <?php
$req=$bdd->query('SELECT * FROM station_list');
while($donnees=$req->fetch()){
    echo '<a href = "/website/statistics/individual.php?name='.$donnees['name'].'">'.$donnees['name'].'</a>';
}
?>
    </div>
    </li>

 <li style="float:right" class="dropdown">
    <a href="/website/settings/index.php" class="dropbtn">Settings</a>
    <div class="dropdown-content">
    <a href = "/website/settings/sensor_manager/index.php">Sensor manager</a>
    <a href = "/website/settings/switches_manager/index.php">Switches manager</a>

    </div>
    </li>

    </ul>
