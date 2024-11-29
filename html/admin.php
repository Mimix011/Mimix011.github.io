<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<p>Console :</p>
<div class="console">
<p>Console :</p>
<?php
// Début de la session
session_start();
if (isset($_SESSION['pseudo']) !== null) {
    echo "<script type='text/javascript'>console.log('Vous êtes connecté au compte admin " . $_SESSION['pseudo'] . "');</script>";
} else {
    header('Location: login.php');
}

// Connexion à la base de données Cyberfolio
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "cyberfolio";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Console > Échec de la connexion : " . $conn->connect_error);
}

// PHP permettant l'envoi d'un projet
if (isset($_POST['envoiprojet'])) {
    if (!empty($_POST['Titre']) && !empty($_POST['Date']) && !empty($_POST['Texte']) && !empty($_POST['Competence1']) && !empty($_POST['Competence2']) && !empty($_POST['Competence3']) && isset($_FILES['file'])) {
        $titre = $_POST['Titre'];
        $date = $_POST['Date'];
        $texte = $_POST['Texte'];
        $competence1 = $_POST['Competence1'];
        $competence2 = $_POST['Competence2'];
        $competence3 = $_POST['Competence3'];

        // Gestion du téléchargement du fichier
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];

        if ($fileError === 0) {
            $uploadDir = 'emilefiles/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newFileName = uniqid('file_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            $uploadPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                echo "Console > Le fichier a été téléchargé avec succès.<br>";
            } else {
                echo "Console > Une erreur est survenue lors du téléchargement du fichier.<br>";
            }
        } else {
            echo "Console > Erreur lors du téléchargement du fichier.<br>";
        }

        // Envoi du projet dans la base de données
        $sendProjet = $conn->prepare("INSERT INTO projet (Titre, Date1, Texte, Competence1, Competence2, Competence3, Fichier, Nom) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($sendProjet === false) {
            die("Console > Erreur de préparation de la requête : " . $conn->error);
        }

        $sendProjet->bind_param('ssssssss', $titre, $date, $texte, $competence1, $competence2, $competence3, $uploadPath, $_SESSION['pseudo']);

        if ($sendProjet->execute()) {
            echo "Console > Titre ok<br>";
            echo "Console > Date ok<br>";
            echo "Console > Texte ok<br>";
            echo "Console > Compétence 1 ok<br>";
            echo "Console >  Compétence 2 ok<br>";
            echo "Console >  Compétence 3 ok<br>";
            echo "Console > Projet ajouté avec succès!<br>";
            $titre = null;
            $date = null;
            $texte = null;
            $competence1 = null;
            $competence2 = null;
            $competence3 = null;

            // Gestion du téléchargement du fichier
            $fileTmpPath = null;
            $fileName = null;
            $fileSize = null;
            $fileType = null;
            $fileError = null;

        } else {
            echo "Console > Erreur lors de l'insertion du projet : " . $sendProjet->error . "<br>";
        }

        $sendProjet->close();
    } else {
        echo "Console > Veuillez remplir tous les champs et télécharger un fichier.<br>";
    }
}

// Si l'on clique sur "Voir l'aperçu", on récupère les valeurs
if (isset($_POST['viewprojet'])) {
    $titre = $_POST['Titre'];
    $date = $_POST['Date'];
    $texte = $_POST['Texte'];
    $competence1 = $_POST['Competence1'];
    $competence2 = $_POST['Competence2'];
    $competence3 = $_POST['Competence3'];
}













if (isset($_POST['envoiexperience'])) {
    $conn = new mysqli($host, $username, $password, $dbname);
    if (!empty($_POST['Titre2']) && !empty($_POST['Date2']) && !empty($_POST['Texte2']) && !empty($_POST['Competence12']) && !empty($_POST['Competence22']) && !empty($_POST['Competence32'])) {
        $titre2 = $_POST['Titre2'];
        $date2 = $_POST['Date2'];
        $texte2 = $_POST['Texte2'];
        $competence12 = $_POST['Competence12'];
        $competence22 = $_POST['Competence22'];
        $competence32 = $_POST['Competence32'];



      

        // Envoi du projet dans la base de données
        $sendExp = $conn->prepare("INSERT INTO experience (Titre, Date1, Texte, Competence1, Competence2, Competence3, Nom) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($sendExp === false) {
            die("Console > Erreur de préparation de la requête : " . $conn->error);
        }

        $sendExp->bind_param('ssssssss', $titre2, $date2, $texte2, $competence12, $competence22, $competence32, $_SESSION['pseudo']);

        if ($sendExp->execute()) {
            echo "Console > Titre ok<br>";
            echo "Console > Date ok<br>";
            echo "Console > Texte ok<br>";
            echo "Console > Compétence 1 ok<br>";
            echo "Console >  Compétence 2 ok<br>";
            echo "Console >  Compétence 3 ok<br>";
            echo "Console > Projet ajouté avec succès!<br>";
            $titre2 = null;
            $date2 = null;
            $texte2 = null;
            $competence12 = null;
            $competence22 = null;
            $competence32 = null;


        } else {
            echo "Console > Erreur lors de l'insertion du projet : " . $sendExp->error . "<br>";
        }

        $sendExp->close();
    } else {
        echo "Console > Veuillez remplir tous les champs et télécharger un fichier.<br>";
    }
}

// Si l'on clique sur "Voir l'aperçu", on récupère les valeurs
if (isset($_POST['viewprojet-2'])) {
    $titre2 = $_POST['Titre-2'];
    $date2 = $_POST['Date-2'];
    $texte2 = $_POST['Texte-2'];
    $competence12 = $_POST['Competence1-2'];
    $competence22 = $_POST['Competence2-2'];
    $competence32 = $_POST['Competence3-2'];
}











?>
</div>
<body>
    <?php echo "<h1>Administrateur - ". strtoupper($_SESSION['pseudo']) ." </h1>"?>;
    <p class='presentation'>Vous êtes actuellement dans la partie admin du site. Remplissez les formulaires pour ajouter du contenu au portfolio</p>

    <h2>Ajouter un Projet</h2>
    <form method='POST' action='' enctype='multipart/form-data' id="postprojet">
        <input type='text' name='Titre' autocomplete='off' placeholder='Titre' value="<?php echo isset($titre) ? $titre : ''; ?>" required>
        <input type='text' name='Date' autocomplete='off' placeholder='Date' value="<?php echo isset($date) ? $date : ''; ?>" required>
        <textarea name='Texte' placeholder='Texte' required><?php echo isset($texte) ? $texte : ''; ?></textarea>
        <input type='text' name='Competence1' autocomplete='off' placeholder='Compétence 1' value="<?php echo isset($competence1) ? $competence1 : ''; ?>" required>
        <input type='text' name='Competence2' autocomplete='off' placeholder='Compétence 2' value="<?php echo isset($competence2) ? $competence2 : ''; ?>" required>
        <input type='text' name='Competence3' autocomplete='off' placeholder='Compétence 3' value="<?php echo isset($competence3) ? $competence3 : ''; ?>" required>
        <input type='file' name='file' id='file' required>
        <button type='submit' name='envoiprojet'>Envoyer</button>
        <button type='submit' name='viewexperience'>Voir l'aperçu</button>
    </form>

    <?php if (isset($titre)): ?>
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



    <h2>Ajouter une Experience Professionel</h2>
    <form method='POST' action='' enctype='multipart/form-data' id="postexperience">
        <input type='text' name='Titre2' autocomplete='off' placeholder='Titre' value="<?php echo isset($titre2) ? $titre2 : ''; ?>" required>
        <input type='text' name='Date2' autocomplete='off' placeholder='Date' value="<?php echo isset($date2) ? $date2 : ''; ?>" required>
        <textarea name='Text-2' placeholder='Texte' required><?php echo isset($texte) ? $texte2 : ''; ?></textarea>
        <input type='text' name='Competence12' autocomplete='off' placeholder='Compétence 1' value="<?php echo isset($competence21) ? $competence12 : ''; ?>" required>
        <input type='text' name='Competence22' autocomplete='off' placeholder='Compétence 2' value="<?php echo isset($competence22) ? $competence22 : ''; ?>" required>
        <input type='text' name='Competence32' autocomplete='off' placeholder='Compétence 3' value="<?php echo isset($competence32) ? $competence32 : ''; ?>" required>
        <button type='submit' name='envoiexperience'>Envoyer</button>
        <button type='submit' name='viewexperience'>Voir l'aperçu</button>
    </form>

    <?php if (isset($titre2)): ?>
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
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }
    .projet {
        width: 500px;
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
    form{
        display: flex;
        flex-direction: column;
        width: 40%;
        gap: 10px;
    }
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }
</style>

</html>
