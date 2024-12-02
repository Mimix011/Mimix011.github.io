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
if (!isset($_SESSION['pseudo'])) {
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
if (isset($_POST['envoiprojet'])) {
    if (!empty($_POST['Titre']) && !empty($_POST['Date']) && !empty($_POST['Texte']) &&
        !empty($_POST['Competence1']) && !empty($_POST['Competence2']) && !empty($_POST['Competence3']) && isset($_FILES['file'])) {

        $titre = $_POST['Titre'];
        $date = $_POST['Date'];
        $texte = $_POST['Texte'];
        $competence1 = $_POST['Competence1'];
        $competence2 = $_POST['Competence2'];
        $competence3 = $_POST['Competence3'];

        // Gestion du fichier
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = uniqid('file_', true) . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Enregistrement dans la base de données
            $stmt = $conn->prepare("INSERT INTO projet (Titre, Date1, Texte, Competence1, Competence2, Competence3, Fichier, Nom) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $titre, $date, $texte, $competence1, $competence2, $competence3, $uploadPath, $_SESSION['pseudo']);
            if ($stmt->execute()) {
                echo "<p class='text-success'>Projet ajouté avec succès !</p>";
            } else {
                echo "<p class='text-danger'>Erreur lors de l'ajout du projet : " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p class='text-danger'>Erreur lors du téléchargement du fichier.</p>";
        }
    } else {
        echo "<p class='text-danger'>Veuillez remplir tous les champs et télécharger un fichier.</p>";
    }
}

// Formulaire "Expérience Professionnelle"
if (isset($_POST['envoiexperience'])) {
    if (!empty($_POST['Titre2']) && !empty($_POST['Date2']) && !empty($_POST['Texte2']) &&
        !empty($_POST['Competence12']) && !empty($_POST['Competence22']) && !empty($_POST['Competence32'])) {

        $titre2 = $_POST['Titre2'];
        $date2 = $_POST['Date2'];
        $texte2 = $_POST['Texte2'];
        $competence12 = $_POST['Competence12'];
        $competence22 = $_POST['Competence22'];
        $competence32 = $_POST['Competence32'];

        // Enregistrement dans la base de données
        $stmt = $conn->prepare("INSERT INTO experience (Titre, Date1, Texte, Competence1, Competence2, Competence3, Nom) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $titre2, $date2, $texte2, $competence12, $competence22, $competence32, $_SESSION['pseudo']);
        if ($stmt->execute()) {
            echo "<p class='text-success'>Expérience ajoutée avec succès !</p>";
        } else {
            echo "<p class='text-danger'>Erreur lors de l'ajout de l'expérience : " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='text-danger'>Veuillez remplir tous les champs.</p>";
    }
}
?>

<h1 class="text-center bg-dark text-white p-3">Administrateur - <?php echo strtoupper($_SESSION['pseudo']); ?></h1>

<div class="container mt-5">
    <h2>Ajouter un Projet</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="Titre" placeholder="Titre" class="form-control" value="<?php echo $titre; ?>" required>
        <input type="text" name="Date" placeholder="Date" class="form-control mt-2" value="<?php echo $date; ?>" required>
        <textarea name="Texte" placeholder="Texte" class="form-control mt-2" required><?php echo $texte; ?></textarea>
        <input type="text" name="Competence1" placeholder="Compétence 1" class="form-control mt-2" value="<?php echo $competence1; ?>" required>
        <input type="text" name="Competence2" placeholder="Compétence 2" class="form-control mt-2" value="<?php echo $competence2; ?>" required>
        <input type="text" name="Competence3" placeholder="Compétence 3" class="form-control mt-2" value="<?php echo $competence3; ?>" required>
        <input type="file" name="file" class="form-control mt-2" required>
        <button type="submit" name="envoiprojet" class="btn btn-primary mt-2">Envoyer</button>
        <button type='submit' name='viewprojet' class="btn btn-warning mt-2">Voir l'aperçu</button>
    </form>

    <?php if (isset($_POST['viewprojet'])): 
        if (!empty($_POST['Titre']) && !empty($_POST['Date']) && !empty($_POST['Texte']) &&!empty($_POST['Competence1']) && !empty($_POST['Competence2']) && !empty($_POST['Competence3'])) {
        $titre = $_POST['Titre'];
        $date = $_POST['Date'];
        $texte = $_POST['Texte'];
        $competence1 = $_POST['Competence1'];
        $competence2 = $_POST['Competence2'];
        $competence3 = $_POST['Competence3'];
        }
        ?>
        <div class='projet'>
            <h2 class='title_projet'><?php echo $titre; ?></h2>
            <p class='date_projet'><?php echo $date; ?></p>
            <p class='text_description'><?php echo $texte; ?></p>
            <div class='ContainerCompetence'>
                <div class='competences2'>
                    <div class='competence2'>
                        <img src='../img/logo.png' class='logo2'>
                        <p class='desc_competence'><?php echo $competence1; ?></p>
                    </div>
                    <div class='competence2'>
                        <img src='../img/logo.png' class='logo2'>
                        <p class='desc_competence'><?php echo $competence2; ?></p>
                    </div>
                    <div class='competence2'>
                        <img src='../img/logo.png' class='logo2'>
                        <p class='desc_competence'><?php echo $competence3; ?></p>
                    </div>
                </div>
                <a href='' download>
                    <button class='Download'>Télécharger les fichiers du projet</button>
                </a>
            </div>
        </div>
    <?php endif; ?>


    <h2 class="mt-5">Ajouter une Expérience Professionnelle</h2>
    <form method="POST">
        <input type="text" name="Titre2" placeholder="Titre" class="form-control" value="<?php echo $titre2; ?>" required>
        <input type="text" name="Date2" placeholder="Date" class="form-control mt-2" value="<?php echo $date2; ?>" required>
        <textarea name="Texte2" placeholder="Texte" class="form-control mt-2" required><?php echo $texte2; ?></textarea>
        <input type="text" name="Competence12" placeholder="Compétence 1" class="form-control mt-2" value="<?php echo $competence12; ?>" required>
        <input type="text" name="Competence22" placeholder="Compétence 2" class="form-control mt-2" value="<?php echo $competence22; ?>" required>
        <input type="text" name="Competence32" placeholder="Compétence 3" class="form-control mt-2" value="<?php echo $competence32; ?>" required>
        <button type="submit" name="envoiexperience" class="btn btn-primary mt-2">Envoyer</button>
        <button type='submit' name='viewexperience' class="btn btn-warning mt-2">Voir l'aperçu</button>
    </form>
 
 
 
 
<?php if (isset($_POST['viewexperience'])): ?>
        <div class='projet'>
            <h2 class='title_projet'><?php echo $titre2; ?></h2>
            <p class='date_projet'><?php echo $date2; ?></p>
            <p class='text_description'><?php echo $texte2; ?></p>
            <div class='ContainerCompetence'>
                <div class='competences2'>
                    <div class='competence2'>
                        <img src='../img/logo.png' class='logo2'>
                        <p class='desc_competence'><?php echo $competence12; ?></p>
                    </div>
                    <div class='competence2'>
                        <img src='../img/logo.png' class='logo2'>
                        <p class='desc_competence'><?php echo $competence22; ?></p>
                    </div>
                    <div class='competence2'>
                        <img src='../img/logo.png' class='logo2'>
                        <p class='desc_competence'><?php echo $competence32; ?></p>
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>







</div>



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
