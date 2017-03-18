<?php
try
{
	$bdd=new PDO('mysql:host=localhost;dbname=domotic_project;charset=utf8','root','123abc');
}
catch(Exception $e)
{
	die('Error: '.$e->getMessage());
}
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>set switches</title>
coucou
<br>
<br>
<?php
$req=$bdd->query('SELECT * FROM interrupteurs');
?>

<form method="post" action="interrupt_post.php">
      <select name="select">
      <?php
	while($donnees=$req->fetch()){
		echo '<option value="'.htmlspecialchars($donnees['id']).'">'.htmlspecialchars($donnees['lieu']).'-'.htmlspecialchars($donnees['nom']).'</option>';
		}
		?>
	      </select>
	      <input type="submit" value="switch">
</form>


