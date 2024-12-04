<!-- inclusion des variables et fonctions -->
<?php
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Site de recettes - Page d'accueil</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href = "css/style.css">
		<link rel="styltsheet" href="css/api.css">
	</head>
	<video autoplay muted loop id="background-video">
		<source class="video_sombre" src="../img/background_index.mp4" type="video/mp4" id="video_d">
		Votre navigateur ne supporte pas les vidéos HTML5.
	</video>
	<body class="d-flex flex-column min-vh-100">
		<div class="container">
			<!-- inclusion de l'entête du site -->
			<?php require_once(__DIR__ . '/header.php'); ?>
			<h1>Site de recettes</h1>

			<!-- Formulaire de connexion -->
			<?php require_once(__DIR__ . '/login.php'); ?>

			<?php if (isset($loggedUser)) : ?>
				<?php foreach (getRecipes($recipes) as $recipe) : ?>
					<article>
						<h3><?php echo $recipe['title']; ?></h3>
						<div><?php echo $recipe['recipe']; ?></div>
						<i><?php echo displayAuthor($recipe['author'], $users); ?></i>
					</article>
				<?php endforeach ?>
			<?php endif; ?>
		</div>

		<!-- inclusion du bas de page du site -->
		<?php require_once(__DIR__ . '/footer.php'); ?>
	</body>
</html>