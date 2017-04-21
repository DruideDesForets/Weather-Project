    <?php
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
$req=$bdd->prepare('DELETE FROM station_list WHERE name=?');
$req->execute(array($_POST['select']));

header('location:index.php');
    ?>
