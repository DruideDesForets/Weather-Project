    <?php
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','admin','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}
if (isset($_POST['temperature']) &&  $_POST['temperature'] == 'on'){
    $req=$bdd->prepare('UPDATE station_list SET temperature=0 WHERE name=?');
    $req->execute(array($_POST['select']));
}
if (isset($_POST['pressure']) && $_POST['pressure'] == 'on'){
    $req=$bdd->prepare('UPDATE station_list SET pressure=0 WHERE name=?');
    $req->execute(array($_POST['select']));
}
if (isset($_POST['humidity']) && $_POST['humidity'] == 'on'){
    $req=$bdd->prepare('UPDATE station_list SET humidity=0 WHERE name=?');
    $req->execute(array($_POST['select']));
}
header('location:index.php');
    ?>
