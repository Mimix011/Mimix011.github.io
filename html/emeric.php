<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio de Goris Emeric</title>
    <!-- Lien vers la police Silkscreen de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/emeric.css">
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
  </head>
  <?php
        
        // Informations de connexion à la base de données
        $host = "localhost"; // Serveur
        $username = "root";  // Nom d'utilisateur
        $password = "root";      // Mot de passe
        $dbname = "cyberfolio"; // Nom de la base de données
        $nom = "emeric";
        
        // Connexion à la base
        $conn = new mysqli($host, $username, $password, $dbname);
        
        // Vérifiez la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }
        $conn->set_charset("utfmb4");
        
?>


  <body>
    <!-- Barre de navigation déroulante -->
    <section class="top-nav"> 
      <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
          <div class='menu-button'></div>
        </label>
        <ul class="menu">
          <li><a href= "../index.html">Accueil</a></li>
          <li class="partenaire">
            <a href="../html/partenaires.html">partenaire</a>
              <ul class="partenaire_menu">
                <li> <a href="../html/emile.php">emile</a></li>
                <li><a href="../html/jassym.html">Jassym</a></li>
                <li><a href="../html/dimitri.html">Dimitri</a></li>
                <li><a href="../html/Ilyass.php">Ilyas</a></li>
              </ul>
          </li>
          <li>
            <a href="../html/contact.html">Contact</a>
          </li>
        </ul>
      <input class="inputswitch" type="checkbox" id="darkmode-toggle">
      <label class="switch" for="darkmode-toggle"></label>
      <div class="backswitch"></div>
    </section>

    <!-- Section du texte dynamique -->
    <header>
      <h1 id="dynamic-text"></h1>
    </header>

    <!-- Section des bulles -->
    <div class="container">
      <img class="image" src="../img/Image4.jpg" alt="emeric">
      <div class="name">
        <h2>Goris Emeric</h2>
        <p class="ecole">1ère année à Guardia Cybersecurity School</p>
      </div>
    </div>


    <div class="title">
      <h4>
        Présentation
      </h4>
    </div>

    <div class="containerslider">
      <div class="slider-container slider-1">
        <div class="slider">
          <section class="presentation">
            <h2 class="titlepresentation">Qui suis-je ?</h2>
            <p>je m'appelle Goris Emeric,  je suis étudient de premier année à Guardia cybersécurity school</p>
          </section>
          <section class="presentation">
            <h2 class="titlepresentation">Quelle sont mes centre d'întert profésionnel</h2>
            <p>Je suis passionné par les réseaux informatique , la technologie et la cybersécuriter. J'aime découvrire et apprendre de nouvelle chose dans ce dommaine.</p>
          </section>
          <section class="presentation">
            <h2 class="titlepresentation">Quelle sont mes centre d'întert personnel</h2>
            <p>En dehors de mes études, je suis un amateur de jeux video ce qui me permet de devlopper une cohésion d'équipe. Le skie et le parapent me permet de repouser et voir mes limites, tandis que le dessin me permet de devlopper ma créativiter </p>
          </section>
        </div>
      </div>
    </div>


    <div class="title">
      <h4>
        Compétences
      </h4>
    </div>
    <div class="container2">
      
      <div class="CompetenceBox">
        <img src="../img/Emeric/compétence.png" class="logo"></img>
        <h3>
          Programmation :
        </h3>
        <p class="textcompetence">apprent le langage python,Je connais les base en SQL.</p>
      </div>
      <div class="CompetenceBox">
        <img src="../img/Emeric/compétence.png" class="logo"></img>
        <h3>
          Developpement Web
        </h3>
        <p class="textcompetence">Connaissances des base en html, css et javascript pour crée des site web</p>
      </div>
      <div class="CompetenceBox">
        <img src="../img/Emeric/compétence.png" class="logo"></img>
        <h3>
          travail d'équipe
        </h3>
        <p class="textcompetence">je sais travail en groupe et utiliser des logiciels de gestion de projet (trello, drive, github)</p>
      </div>
      <div class="CompetenceBox">
        <img src="../img/Emeric/compétence.png" class="logo"></img>
        <h3>
          autonomie
        </h3>
        <p class="textcompetence">J'arrive à travailer en autonomie.</p>
      </div>
    <div class="title">
      <h4>
        Projet
      </h4>
    </div>


    <div class="ContainerProjet">
      
<?php
            
            // Requête SQL pour récupérer les données
            $sql = "SELECT * FROM projet where Nom='". $nom ."'";
            $result = $conn->query($sql);
            
            // Vérification des résultats
            if ($result->num_rows > 0) {
                // Création d'un tableau HTML avec les données
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='projet' id=". strval($row['ID']) .">";
                    echo "<h2 class='title_projet'>". $row['Titre'] ."</h2>";
                    echo "<p class='date_projet'>". $row['Date1'] ."</p>";
                    echo "<p class='text_description'>". $row['Texte'] ."</p>";
                    echo "<div class='ContainerCompetence'>
                            <a href=". $row["Fichier"] ." download><button class='Download'>Télécharger les fichiers du projet</button></a>
                          </div>";
                    echo "</div>";
                            
                }
            } 
            
            





            
        echo "</div>";
    echo "</div>";
   
            // Fermeture de la connexion
            $conn->close();
?>
       
   <!-- Texte sur la cohésion d'équipe -->
 
    <!-- Curseur personnalisé -->
    <footer>
      <h2 class="Contacter">Me Contacter</h2>
      <a class="lien_linkdien" href="https://www.linkedin.com/in/emeric-goris">
        <img class="linkedin" src="../img/Emeric/LinkedinEmeric.gif" alt="Gif linkedin"/>
      </a>
    </footer>
  </body>
</html>