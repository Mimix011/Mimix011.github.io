
<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root','root');
if(isset($_POST['envoi'])){
	if (!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mdp = sha1($_POST['mdp']);
		$recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
		$recupUser->execute(array($pseudo,$mdp));
		if ($recupUser->rowCount() > 0){
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['mdp'] = $mdp;
			$_SESSION['id'] = $recupUser->fetch()['id'];
			header('Location: admin.php');


		}else{
			echo 'Le Username ou/et le Mot de passe est incorrect';
		}
	}else{
		echo "Veuillez renseigner tout les champs";
	}
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<form method="POST" action="">
		<input type="text" name="pseudo" autocomplete="off">
		<input type="password" name="mdp" autocomplete="off">
		<br><br>
		<button type="submit" name="envoi">Envoyer</button>
	</form>
</body>
</html>

