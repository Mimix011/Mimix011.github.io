<!-- inclusion des variables et fonctions -->
<?php
session_start();

if (isset($_SESSION['id']) !== null){
	echo $_SESSION['pseudo'];

}else{
	echo "tu n'es pas connecter";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Site de recettes - Page d'accueil</title>
	<link
        	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        	rel="stylesheet"
	>
</head>
<body>

</body>
</html>