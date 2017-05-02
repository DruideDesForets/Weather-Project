    <aside class="container">

    <?php
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','switch_setter','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}

$req=$bdd->query('SELECT * FROM switches');
    ?>


    <div id="clock_container"></div>
    <?php include 'clock.php';

$date = date_create('2000-01-01');
echo '<div class="date">'.date('d/m/y').'</div>';
    ?>
    <br>
    <form method="post" action="/website/switches_post.php">
    <label><h2 class="set_switches">SET SWITCHES<h2></label>
    <select name="select">
    <?php
while($donnees=$req->fetch()){
    echo '<option value="'.htmlspecialchars($donnees['id']).'">'.htmlspecialchars($donnees['name']).'</option>';
}
    ?>
    </select>
    <input type="submit" value="switch">
    </form>
    </aside>
