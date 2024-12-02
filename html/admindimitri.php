<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
// Début de la session
session_start();

// Vérification de l'accès
if ($_SESSION['pseudo']!=="dimitri") {
    header('Location: login.php');
    exit();
}

// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "cyberfolio";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Variables pour stocker les valeurs des formulaires
$titre = $date = $texte = $competence1 = $competence2 = $competence3 = "";
$titre2 = $date2 = $texte2 = $competence12 = $competence22 = $competence32 = "";

// Formulaire "Projet"
?>

<div class="container mt-5" >
    <h2>Ajouter une compétence</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="Titre3" placeholder="Titre" class="form-control" value="<?php echo $titre; ?>" required>
        <input type="file" name="file3" class="form-control mt-2" required>
        <button type="submit" name="envoicompetence" class="btn btn-primary mt-2">Envoyer</button>
    </form>
</div>



<?php



// Formulaire "Projet"
if (isset($_POST['envoicompetence'])) {
    if (!empty($_POST['Titre3']) &&  isset($_FILES['file3'])) {

        $titre3 = $_POST['Titre3'];

        // Gestion du fichier
        $uploadDir3 = 'uploads/';
        if (!is_dir($uploadDir3)) {
            mkdir($uploadDir3, 0777, true);
        }

        $fileTmpPath3 = $_FILES['file3']['tmp_name'];
        $fileName3 = uniqid('file_', true) . '.' . pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION);
        $uploadPath3 = $uploadDir3 . $fileName3;

        if (move_uploaded_file($fileTmpPath3, $uploadPath3)) {
            // Enregistrement dans la base de données
            $stmt3 = $conn->prepare("INSERT INTO competence (Competence, Fichier, nom) VALUES (?, ?, ?)");
            $stmt3->bind_param("sss", $titre3, $uploadPath3,$_SESSION['pseudo']);
            if ($stmt3->execute()) {
                echo "<p class='text-success'>Projet ajouté avec succès !</p>";
            } else {
                echo "<p class='text-danger'>Erreur lors de l'ajout du projet : " . $stmt3->error . "</p>";
            }
            $stmt3->close();
        } else {
            echo "<p class='text-danger'>Erreur lors du téléchargement du fichier.</p>";
        }
    } else {
        echo "<p class='text-danger'>Veuillez remplir tous les champs et télécharger un fichier.</p>";
    }
}
?>



</body>



<style type="text/css">
    h1 {
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        background-color: black;
        color: white;
        text-align: center;
        padding: 10px;
        z-index: 1;
    }
    .presentation {
        margin: 0px;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }
    .projet {
        width: 500px;
        margin-top: 50px;
        background-color: rgb(227, 227, 227);
        box-shadow: 0px 0px 10px black;
        margin: 0;
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid black;
        padding: 10px;
    }
    .title_projet {
        text-align: center;
        margin-top: 10px;
    }
    .competences2 {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 30px;
        margin: 0;
    }
    .competence2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
    }
    .logo2 {
        width: 70px;
        height: 70px;
        border-radius: 100%;
        object-fit: cover;
        overflow: hidden;
    }
    .Download {
        width: 100%;
        height: 50px;
        border: 1px solid black;
        background-color: rgb(0, 0, 0, 0.1);
        color: black;
    }
    .Download:hover {
        background-color: rgb(0, 0, 0, 0.5);
        color: white;
    }
    .console{
        width: 40%;
        margin-top: 100px;
        height: 200px;
        overflow-y: scroll;
        box-shadow: 0px 0px 10px black;
    }

</style>









</html>
