
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

<form method="post" action="set_frequency_post.php">
    <p>Which station</p></br>
    <select name="select">
    <?php
    while($donnees=$req->fetch()){
	echo '<option value="'.htmlspecialchars($donnees['name']).'">'.htmlspecialchars($donnees['name']);
	echo '</option>';
}
    ?>
    </select>
    <br>
   <p>One step each</p><input type="number" name="frequency" value="1" min="1"><p>secondes</p>
    <br>
    <br>
    <input type="submit" value="Set">
    </form> 
    <br>
