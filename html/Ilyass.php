<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Portfolio</title>
  <link rel="stylesheet" href="../css/iliyas.css">
</head>
<body>
  <nav class="navbar">
      
    <div class="nav-links">
      <ul>
        <li><a href="https://guardia.school/"><img src="..\img\guardiagif.gif" alt="Logo" class="logo"></a></li>
        <li><a href="../html/emeric.php">Goris Emeric</a></li>
        <li><a href="../html/emile.php">Chameau Emile</a></li>
        <li><a href="../html/dimitri.html">Bacot Dimitri</a></li>
        <li><a href="../html/jassym.html">Ferah Jassym</a></li>
      </ul>
    </div>
  </nav>


  <?php
        
        // Informations de connexion à la base de données
        $host = "localhost"; // Serveur
        $username = "root";  // Nom d'utilisateur
        $password = "root";      // Mot de passe
        $dbname = "cyberfolio"; // Nom de la base de données
        $nom = "ilyass";
        
        // Connexion à la base
        $conn = new mysqli($host, $username, $password, $dbname);
        
        // Vérifiez la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }
        $conn->set_charset("utfmb4");
        
?>






<body>
  <header class="profile-header">
    
    <img src="../img/Image3.jpg" alt="Photo de profil" class="profile-image">
    <h1>BOINAHERY Ilyass</h1>
  </header>

  <main>
    <section class="description">
      <div class="Intro">
      <h2>À propos de moi</h2>
      <p>Je suis un développeur passionné par la technologie et la création de solutions innovantes. J'ai une expérience solide dans le développement web et mobile, ainsi que dans la gestion de projets. Je suis toujours à la recherche de nouvelles opportunités pour apprendre et grandir professionnellement.</p>
      </div>
    </section>

    <section class="skills-plan">


                                    
                          <?php
                                $sql = "SELECT * FROM competence where Nom='". $nom ."'";
                        $result = $conn->query($sql);
                        echo "<h2>Compétences:</h2>";
                        echo "<ul>";
                        // Vérification des résultats
                        if ($result->num_rows > 0) {
                            // Création d'un tableau HTML avec les données
                            while ($row = $result->fetch_assoc()) {
                              echo "<li>". $row['Competence'] ."</li>";

                            }
                            echo "</ul>";
                        }


                                ?>  
      
    </section>

    <section class="projects">
      <h2>Projets Réalisés</h2>
      <div class="projects-container">

      <?php
            
            // Requête SQL pour récupérer les données
            $sql = "SELECT * FROM projet where Nom='". $nom ."'";
            $result = $conn->query($sql);
            
            // Vérification des résultats
            if ($result->num_rows > 0) {
                // Création d'un tableau HTML avec les données
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='project' id=". strval($row['ID']) .">";
                    echo "<h3 class='title_projet'>". $row['Titre'] ."</h3>";
                    echo "<p>". $row['Texte'] ."</p>";
                    echo "</div>";
                            
                }
            } 
            
   
            // Fermeture de la connexion
            $conn->close();
?>


 
    </div>
    </section>
  </main>
  <section class="contact">
    <h2>Contact</h2>
    <ul class="logo_contact">
      <li><a href="mailto:votre-email@example.com"><img src="..\img\Image_ilyass\image_portfolio\mail.gif" alt="Logo" class="footer-logo">E-mail</a></li>
      <li><a href="https://www.linkedin.com/in/votre-profil-linkedin/" target="_blank"><img src="..\img\Image_ilyass\image_portfolio\Lkin.gif" alt="Logo" class="footer-logo">LinkedIn</a>
      <li><a href="https://discordapp.com/users/votre-id-discord" target="_blank"><img src="..\img\Image_ilyass\image_portfolio\DISCORD_LOGO.gif" alt="Logo" class="footer-logo">Discord</a></li>
    </ul>
  </section>
  <footer class="footer-logo">
    <!-- Contenu du footer --
  </footer>
</body>

</html>
