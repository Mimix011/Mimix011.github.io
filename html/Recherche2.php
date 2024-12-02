
<?php
    // Informations de connexion à la base de données
    $host = "localhost"; // Serveur
    $username = "root";  // Nom d'utilisateur
    $password = "root";      // Mot de passe
    $dbname = "cyberfolio"; // Nom de la base de données
    
    // Connexion à la base
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }
    
    // Requête SQL pour récupérer les données
    $sql = "SELECT Titre, Date, Texte FROM projet";
    $result = $conn->query($sql);
    
    // Vérification des résultats
    if ($result->num_rows > 0) {
        // Création d'un tableau HTML avec les données
        $projects = []; // Créer un tableau pour stocker les projets
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    } else {
        $projects = []; // Aucun projet trouvé
    }
    
    // Fermer la connexion
    $conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="/css/recherch_page.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="recherche">
    <video autoplay muted loop id="background-video">
        <source src="/img/background_index.mp4" type="video/mp4">
        Votre navigateur ne supporte pas les vidéos HTML5.
    </video>

    <nav> 
        <div class="progress_container">
            <div class="progress_bar"></div>
        </div>

        <section class="top-nav">
            <input id="menu-toggle" type="checkbox" />
            <label class="menu-button-container" for="menu-toggle">
                <div class="menu-button"></div>
            </label>
            <ul class="menu">
                <li><a href="/index.html">Accueil</a></li>
                <li><a href="html/partenaires.html">Partenaire</a></li>
                <li><a href="html/contact.html">Contact</a></li>
            </ul>
            <a href="https://guardia.school/campus/lyon.html?utm_term=&utm_campaign=PMX+GU+-+Etudiants&utm_source=adwords&utm_medium=ppc&hsa_acc=1749547295&hsa_cam=20907422767&hsa_grp=&hsa_ad=&hsa_src=x&hsa_tgt=&hsa_kw=&hsa_mt=&hsa_net=adwords&hsa_ver=3&gad_source=1&gclid=Cj0KCQiA0fu5BhDQARIsAMXUBOLF5lQxduMnrC_3qKBJVAWHTUJK-DNhqhYN9tiGD5igEzrigsmo3pAaAjjzEALw_wcB">
                <img src="img/guardiagif.gif" alt="Logo" class="logo">
            </a>
        </section>
    </nav>

    <header>
        <h1 class="titel_l">Recherche</h1>
    </header>

    <!-- Barre de recherche -->
    <section>
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Rechercher ...">
        </div>
    </section>

    <section class="filtre"> 
        <div class="row mb-3">
            <div class="col">
                <label for="typeFilter" class="form-label">Filtrer par type :</label>
                <select id="typeFilter" class="form-select">
                    <option value="">Tous</option>
                    <option value="skill">Skills</option>
                    <option value="certification">Certifications</option>
                </select>
            </div>

            <div class="col">
                <label for="nomFilter" class="form-label">Filtrer par nom :</label>
                <input type="text" id="nomFilter" class="search-nom" placeholder="Nom...">
            </div>

            <div class="col">
                <label for="contenuFilter" class="form-label">Filtrer par contenu :</label>
                <input type="text" id="contenuFilter" class="search-contenu" placeholder="Contenu...">
            </div>
        </div>
    </section>

    <!-- Tableau des projets -->
    <section class="projets">
        <?php if (count($projects) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Texte</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $project): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($project['Titre']); ?></td>
                            <td><?php echo htmlspecialchars($project['Date']); ?></td>
                            <td><?php echo htmlspecialchars($project['Texte']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun projet trouvé.</p>
        <?php endif; ?>
    </section>
</body>
</html>
