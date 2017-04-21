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

    <form method="post" action="switches_post.php">
    <div id="clock_container"></div>
    <?php include 'clock.php'; ?>
    <label><h2>SET SWITCHES<h2></label> <br />
    <select name="select">
    <?php
while($donnees=$req->fetch()){
    echo '<option value="'.htmlspecialchars($donnees['id']).'">'.htmlspecialchars($donnees['lieu']).'-'.htmlspecialchars($donnees['name']).'</option>';
}
    ?>
    </select>
    <input type="submit" value="switch">
    </form>
    </aside>
