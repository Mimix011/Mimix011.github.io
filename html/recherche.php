<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio de Ferah Jassym</title>
  <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/recherche.css" id="theme-link">

</head>
<body>
  <!-- Vidéo en arrière-plan -->
  <video autoplay muted loop id="background-video">
    <source class="video_sombre" src="../img/background_index.mp4" type="video/mp4" id="video_d">
    Votre navigateur ne supporte pas les vidéos HTML5.
  </video>

  <!-- Barre de navigation -->
  
  
  <section class="top-nav"> 
    <input id="menu-toggle" type="checkbox" />
      <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
      </label>
      <ul class="menu">
        <li><a href= "#">Accueil</a></li>
        <li class="partenaire">
          <a href="#">partenaire</a>
            <ul class="partenaire_menu">
              <li><a href="html/emeric.html">Emeric</a></li>
              <li><a href="html/emile.html">Emile</a></li>
              <li><a href="html/jassim.html">Jassym</a></li>
              <li><a href="html/dimitri.html">Dimitri</a></li>
              <li><a href="html/Ilyas.html">Ilyas</a></li>
            </ul>
        </li>
        <li>
          <a href="#">Contact</a>
        </li>
        <input name="Recherche"title="Recherche"></input>
      </ul>
    <input class="inputswitch" type="checkbox" id="darkmode-toggle">
  </section>
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
        echo "<div class='texte'>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["Titre"] . "</td>
                    <td>" . $row["Date"] . "</td>
                    <td>" . $row["Texte"] . "</td>
                    </tr>";
        }
        echo "</div>";
    } else {
        echo "Aucune donnée trouvée.";
    }
    
    // Fermeture de la connexion
    $conn->close();
    ?>
  
  

</body>
</html>