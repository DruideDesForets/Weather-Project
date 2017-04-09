    <?php
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','switch_setter','');
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}

$req=$bdd->prepare('SELECT * FROM switches WHERE id=?');
$req->execute(array($_POST['select']));
$donnees=$req->fetch();
if($donnees['light'] == 0){
    $req=$bdd->prepare('UPDATE switches SET light=1 WHERE id=?');
    $req->execute(array($_POST['select']));
}
else if($donnees['light'] == 1){
    $req=$bdd->prepare('UPDATE switches SET light=0 WHERE id=?');
    $req->execute(array($_POST['select']));
}
header('location:index_veranda.php');
    ?>
