    <aside>

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
    <label>SET SWITCHES:</label>
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
