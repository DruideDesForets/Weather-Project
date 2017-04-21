    <?php
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
$req=$bdd->prepare('UPDATE station_list SET frequency=:frequency WHERE name=:name');
$req->execute(array(
    'name' => $_POST['select'],
    'frequency' => $_POST['frequency'],
));

header('location:index.php');
    ?>
