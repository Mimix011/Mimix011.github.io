
<!-- inclusion des variables et fonctions -->
<?php
session_start();

if (isset($_SESSION['id']) !== null){
	echo  "Vous etes connectés à ". $_SESSION['pseudo'] ."<br> <br>";

}else{
	echo "tu n'es pas connecter <br>";
}
?>
<?php
// Démarrer la session// Assurez-vous que la session est démarrée

// Informations de connexion à la base de données
$host = "localhost"; // Serveur
$username = "root";  // Nom d'utilisateur
$password = "root";  // Mot de passe
$dbname = "cyberfolio"; // Nom de la base de données

// Connexion à la base
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if (isset($_POST['envoiprojet'])) {
    // Vérifier si tous les champs sont remplis et si un fichier est téléchargé
    if (!empty($_POST['Titre']) && !empty($_POST['Date']) && !empty($_POST['Texte']) && !empty($_POST['Competence1']) && !empty($_POST['Competence2']) && !empty($_POST['Competence3']) && isset($_FILES['file'])) {

        // Récupérer les données du formulaire
        $titre = $_POST['Titre'];
        $date = $_POST['Date'];
        $texte = $_POST['Texte'];
        $competence1 = $_POST['Competence1'];
        $competence2 = $_POST['Competence2'];
        $competence3 = $_POST['Competence3'];

        // Traitement du fichier téléchargé
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];

        // Vérifier si le fichier a bien été téléchargé sans erreur
        if ($fileError === 0) {
            // Dossier où les fichiers seront enregistrés
            $uploadDir = 'emilefiles/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);  // Créer le dossier s'il n'existe pas
            }

            // Sécuriser le nom du fichier pour éviter les conflits
            $newFileName = uniqid('file_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            $uploadPath = $uploadDir . $newFileName;

            // Déplacer le fichier téléchargé vers le répertoire de destination
            if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                echo "Le fichier a été téléchargé avec succès.<br>";
            } else {
                echo "Une erreur est survenue lors du téléchargement du fichier.<br>";
            }
        } else {
            echo "Erreur lors du téléchargement du fichier.<br>";
        }
        $sendProjet = $conn->prepare("INSERT INTO projet (Titre, Date1, Texte, Competence1, Competence2, Competence3, Fichier, Nom) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // Vérifier si la préparation de la requête a échoué
        if ($sendProjet === false) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        // Lier les paramètres de la requête
        // 'i' pour integer, 's' pour string
        // id est un entier, le reste est une chaîne de caractères
        $sendProjet->bind_param('ssssssss', $titre, $date, $texte, $competence1, $competence2, $competence3, $uploadPath, $_SESSION['pseudo']);


        // Exécuter la requête
        if ($sendProjet->execute()) {
            echo "Projet ajouté avec succès!<br>";
        } else {
            echo "Erreur lors de l'insertion du projet : " . $sendProjet->error . "<br>";
        }

        // Fermer la requête préparée
        $sendProjet->close();
    } else {
        echo "Veuillez remplir tous les champs et télécharger un fichier.<br>";
    }
}

// Formulaire HTML
echo "Ajouter un Projet<br>";
echo "<form method='POST' action='' enctype='multipart/form-data'>
    <input type='text' name='Titre' autocomplete='off' placeholder='Titre' required><br>
    <input type='text' name='Date' autocomplete='off' placeholder='Date' required><br>
    <textarea name='Texte' placeholder='Texte' required></textarea><br>
    <input type='text' name='Competence1' autocomplete='off' placeholder='Compétence 1' required><br>
    <input type='text' name='Competence2' autocomplete='off' placeholder='Compétence 2' required><br>
    <input type='text' name='Competence3' autocomplete='off' placeholder='Compétence 3' required><br>
    <input type='file' name='file' id='file' required><br>
    <button type='submit' name='envoiprojet'>Envoyer</button>
    <button type='submit' name='viewprojet'>Voir l'apperçu</button>
</form>";
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
    <?php
if (isset($_POST['viewprojet'])){
    $titre = $_POST['Titre'];
    $date = $_POST['Date'];
    $texte = $_POST['Texte'];
    $competence1 = $_POST['Competence1'];
    $competence2 = $_POST['Competence2'];
    $competence3 = $_POST['Competence3'];


    echo "<div class='projet'>";
    echo "<h2 class='title_projet'>". $titre ."</h2>";
    echo "<p class='date_projet'>". $date ."</p>";
    echo "<p class='text_description'>". $texte ."</p>";
    echo "<div class='ContainerCompetence'>
    <div class='competences2'>
        <div class='competence2'>
            <img src='../img/logo.png' class='logo2'>
            <p class='desc_competence'>". $competence1 ."</div><div class='competence2'>
            <img src='../img/logo.png' class='logo2'>
            <p class='desc_competence'>". $competence2."</div><div class='competence2'>
            <img src='../img/logo.png' class='logo2'>
            <p class='desc_competence'>". $competence3 ."</div></div><a href='' download>
    <button class='Download'>Télécharger les fichiers du projet</button>
</a></div>";

    echo "</div>";
}
?>
</body>
</html>

