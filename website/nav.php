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
  <li class="overviews">
    <a href="javascript:void(0)" class="dropbtn">Overviews</a>
    <div class="overviews-content">
    <?php
while($donnees=$req->fetch()){
    echo '<a href = "/website/overviews/index.php?name='.$donnees['name'].'">'.$donnees['name'].'</a>';
}
?>
    </div>
    </li>
   <li><a href="/website/statistics/index.php">Statistics</a></li>
   <li style="float:right"><a href="/website/settings/index.php">Settings</a></li>
</ul>
   <!-- <?php
echo '<ul class="nav"><li><a href = "/website/index.php"><h2 id="home"> Home </h2></a></li>';
while($donnees=$req->fetch()){
    echo '<li><a href = "/website/overview.php?name='.$donnees['name'].'"><h2 id="'.$donnees['name'].'">'.$donnees['name'].'</h2></a></li>';
}
echo '<li><a href = "/website/settings/index.php"><h2 id="settings"> </h2></a></li>';
echo'</ul>';

?> -->
