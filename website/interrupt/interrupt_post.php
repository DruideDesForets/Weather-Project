<?php
try
{
	$bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','root','123abc');
}
catch(Exception $e)
{
	die('Error: '.$e->getMessage());
}

$req=$bdd->prepare('SELECT * FROM interrupteurs WHERE id=?');
$req->execute(array($_POST['select']));
$donnees=$req->fetch();
if($donnees['allume'] == 'false'){
		      $req=$bdd->prepare('UPDATE interrupteurs SET allume=\'true\' WHERE id=?');
		      $req->execute(array($_POST['select']));
		      }
else if($donnees['allume'] == 'true'){
		      $req=$bdd->prepare('UPDATE interrupteurs SET allume=\'false\' WHERE id=?');
		      $req->execute(array($_POST['select']));
		      }
header('location:interrupt.php');
?>