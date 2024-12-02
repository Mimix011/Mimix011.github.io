<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio de Chameau Emile</title>
  <!-- Lien vers la police Silkscreen de Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/emile.css">
  <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
</head>
<body>
<section class="top-nav">
    <input id="menu-toggle" type="checkbox" />
    <label class="menu-button-container" for="menu-toggle">
      <div class="menu-button"></div>
    </label>
    <ul class="menu">
      <li><a href="../index.html">Accueil</a></li>
      <li><a href="../html/partenaires.html">Partenaire</a></li>
      <li><a href="../html/contact.html">Contact</a></li>
      <li><a href="../html/Recherche.html">Recherche</a></li>
    </ul>
  <a href="https://guardia.school/campus/lyon.html?utm_term=&utm_campaign=PMX+GU+-+Etudiants&utm_source=adwords&utm_medium=ppc&hsa_acc=1749547295&hsa_cam=20907422767&hsa_grp=&hsa_ad=&hsa_src=x&hsa_tgt=&hsa_kw=&hsa_mt=&hsa_net=adwords&hsa_ver=3&gad_source=1&gclid=Cj0KCQiA0fu5BhDQARIsAMXUBOLF5lQxduMnrC_3qKBJVAWHTUJK-DNhqhYN9tiGD5igEzrigsmo3pAaAjjzEALw_wcB">
  <img src="../img/guardiagif.gif" alt="Logo" class="logo" href="test.html">
</a>
</section>

<?php
        
        // Informations de connexion à la base de données
        $host = "localhost"; // Serveur
        $username = "root";  // Nom d'utilisateur
        $password = "root";      // Mot de passe
        $dbname = "cyberfolio"; // Nom de la base de données
        $nom = "emile";
        
        // Connexion à la base
        $conn = new mysqli($host, $username, $password, $dbname);
        
        // Vérifiez la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }
        $conn->set_charset("utfmb4");
        
?>
    <div class="MainContent" id="d1">
        <div class="Profil">
            <div class="FirstProfil">
                <img class="photodeprofil" src="../img/Image2.jpg"></img>
                <h2>Emile CHAMEAU</h2>
            </div>
            <div class="SecondProfil">
                <p class="Contacts">CONTACTS</p>
                <div class="Contact">
                    <img class="logocontact"src="../img/Emile/email.png"></img>
                    <div class="texts">
                        <p class="textecontact">MAIL</p>
                        <p class="textecontact2">emchameau@guardiaschool.fr</p>
                    </div>
                </div>
                <div class="Contact">
                    <img class="logocontact" src="../img/Emile/tel.png"></img>
                    <div class="texts">
                        <p class="textecontact">TELEPHONE</p>
                        <p class="textecontact2">07 69 72 01 88</p>
                    </div>
                </div>
                <div class="Contact">
                    <img class="logocontact" src="../img/Emile/linkedin1.png"></img>
                    <div class="texts">
                        <p class="textecontact">LINKEDIN</p>
                        <p class="textecontact2">Emile CHAMEAU</p>
                    </div>
                </div>
                <div class="Contact">
                    <img class="logocontact" src="../img/Emile/gps.png"></img>
                    <div class="texts">
                        <p class="textecontact">LOCALISATION</p>
                        <p class="textecontact2">Lyon</p>
                    </div>
                </div>
            </div>
            
        </div>
    <div class="FirstContent">
        <div class="titlecontent">
            <h3>PRESENTATION</h3>
        </div>
        <div class="presentationtexte">
            <p class="TextePresentation">
                Étant un étudiant passionné de cyber et motivé d’apprendre toujours plus, j’ai décidé d'intégrer cette année une école de cybersécurité (Guardia Cybersecurity School) à Lyon. Cette première année dans le bachelor “développeur informatique option cybersécurité” va me permettre d'acquérir des bases solides en culture cyber, Dev SecOps, sécurité ISR (Infrastructure Système & Réseau) et en rétro-ingénierie.
Pointilleux et coopératif, je recherche activement un stage dans le domaine de la cybersécurité pour une durée de 2 à 4 mois entre MAI et SEPTEMBRE 2025.
            </p>
        </div>
        <div class="activitercontent">
            <div class="activiter">
                <img src="../img/Emile/pompier.png" alt="pompier" class="logoact">
                <p class="titreactiviter">Sapeur-Pompier</p>
                <p class="texteactiviter">
                    Après 6 années de formation intence en tant que Jeune Sapeur-Pompier, je suis rentrer Sapeur-Pompier Volontaire au centre de secours de Seyssel en septembre 2023.
                </p>
            </div>
            <div class="activiter">
                <img src="../img/Emile/pompier.png" alt="pompier" class="logoact">
                <p class="titreactiviter">Sapeur-Pompier</p>
                <p class="texteactiviter">
                    Après 6 années de formation intence en tant que Jeune Sapeur-Pompier, je suis rentrer Sapeur-Pompier Volontaire au centre de secours de Seyssel en septembre 2023.
                </p>
            </div>
            <div class="activiter">
                <img src="../img/Emile/pompier.png" alt="pompier" class="logoact">
                <p class="titreactiviter">Sapeur-Pompier</p>
                <p class="texteactiviter">
                    Après 6 années de formation intence en tant que Jeune Sapeur-Pompier, je suis rentrer Sapeur-Pompier Volontaire au centre de secours de Seyssel en septembre 2023.
                </p>
            </div>
        </div>
        
    </div>
    <div class="SecondContent">
        <div class="attributs">
            <div class="attribut">
                <img src="../img/Emile/pointilleux.png" class="logoatt"></img>
                <p class="attri">POINTILLEUX</p>
            </div>
            <div class="attribut">
                <img src="../img/Emile/pointilleux.png"class="logoatt"></img>
                <p class="attri">POINTILLEUX</p>
            </div>
            <div class="attribut">
                <img src="../img/Emile/pointilleux.png"class="logoatt"></img>
                <p class="attri">POINTILLEUX</p>
            </div>
        </div>
        <div class="sousblock">
            <div class="competencecontent">
                <div class="competences">
                                    <?php
                                $sql = "SELECT * FROM competence where Nom='". $nom ."'";
                        $result = $conn->query($sql);
                        
                        // Vérification des résultats
                        if ($result->num_rows > 0) {
                            // Création d'un tableau HTML avec les données
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='competence2'>
                                        <img src='../img/Emile/". $row['Competence'] .".png' class='logocomp'>
                                    <p class='textcomp'>". $row['Competence'] ."</p></div>";

                            }
                        }


                                ?>
            </div>
                <div class="navbar2">
                    
                </div>
            </div>
            <div class="navbar">
                <div class="FirstLink">
                    <button class="button" id="togg1"><h1>Profil</h1></button> 
                </div>
                <div class="SecondLink">
                    <button class="button" id="togg2"><h1>Portfolio</h1></button>
                </div>
                <div class="ThirdLink">
                    <button class="button" id="togg3"><h1>Experience</h1></button>
                </div>
            </div>
        </div>
    </div>
 </div>
 <div class="MainContent2" id="d2" >
    <div class="ProjetContent">
        <h3 class="h3">Projets</h3>
        <div class="projets">
            <!--
            <div class="projet" id="Projet1">
                <h2 class='title_projet'>Pentest</h2>
                <p class="date_projet">Octobre 2024</p>
                <p class="description_projet">
                AZZABI Arij nous à introduit la cybersécurité avec un premier projet de Pentest. <br>
                Connaissances :<br>
                - Outil de Collaboration (Git)<br>
                - Utilisation de Kali Linux à l'aide d'une machine virtuel<br>
                - Hébergement un site PHP en localhost (Uwamp, Docker)<br>
                - Découverte d'outil de Pentest (BurpSuit)<br>
                - Injection SQL, Modification des requêtes http, Broken Access Control, Inclusion de Fichier<br><br>
                
                Missions :<br>
                - S'entrainer sur un site en localhost (Owasp Bricks)<br>
                - Produire un rapport de test d'intrusion</p>
        
                <div class="ContainerCompetence">
                    <div class="competences2">
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">competence</p>
                        </div>
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">competence</p>
                        </div>
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">competence</p>
                        </div>
                    </div>
                </div>
                <a href="dimitri.html" download>
                    <button class="Download">Télécharger les fichiers du projet</button>
                </a>
            </div>
            -->





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
                    <div class='competences2'>
                        <div class='competence2'>
                            <img src='../img/logo.png' class='logo2'>
                            <p class='desc_competence'>". $row['Competence1'] ."</div><div class='competence2'>
                            <img src='../img/logo.png' class='logo2'>
                            <p class='desc_competence'>". $row['Competence2'] ."</div><div class='competence2'>
                            <img src='../img/logo.png' class='logo2'>
                            <p class='desc_competence'>". $row['Competence3'] ."</div></div><a href=". $row["Fichier"] ." download>
                    <button class='Download'>Télécharger les fichiers du projet</button>
                </a></div>";

                    echo "</div>";
                            
                }
            } 
            
            





            
        echo "</div>";
    echo "</div>";
    echo "<div class='projetindex'>";
        echo "<h3 class='h3'>Index</h3>";
        echo "<ul>";
        $sql = "SELECT * FROM projet where Nom='". $nom ."'";
            $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='#". strval($row["ID"]) ."'>". $row['Titre'] ."</a></li>";
        }
            // Fermeture de la connexion
            $conn->close();
?>
        </ul>
        <div class="navbar2">
            <div class="FirstLink2">
                <button class="button" id="togg4"><h1>Profil</h1></button> 
            </div>
            <div class="SecondLink2">
                <button class="button" id="togg5"><h1>Portfolio</h1></button>
            </div>
            <div class="ThirdLink2">
                <button class="button" id="togg6"><h1>Experience</h1></button>
            </div>
        </div>
    </div>
</div>

<div class="MainContent2" id="d3" >
    <div class="ProjetContent">
        <h3 class="h3">Projets</h3>
        <div class="projets">
            <div class="projet" id="Entreprise1">
                <h2 class='title_projet'>Emploi Saisonnier - Mairie Seyssel (01)</h2>
                <p class="date_projet">Agent Polyvalent des Services Techniques (JUILLET - SEPTEMBRE 2024)</p>
                <p class="description_projet">
                    Agent polyvalent des services techniques est le poste que j'ai occupé de Juillet à Septembre 2024. <br>- Entretien des espaces verts (Débroussailleuse, Arrosage, Tondeuse...)<br>- Nettoyage des rues et routes<br>- Responsable de la propreté des lieux publics<br>- Entretien des équipements mis à la disposition du public</p>
        
                <div class="ContainerCompetence">
                    <div class="competences2">
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">Travail en Equipe</p>
                        </div>
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">Adaptabilité</p>
                        </div>
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">Autonomie</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projet" id="Entreprise2">
                <h2 class='title_projet'>Emploi Saisonnier - Marché Pernoud (Chêne-en-Semine)</h2>
                <p class="date_projet">Août 2022</p>
                <p class="description_projet">
                    Marché Pernoud est une entreprise local de vente de produits frais où j'ai travaillé en Aoùt 2022. <br>- Logistique et organisation des entrepôts<br>- Gestion des déchets (carton, aliment avarié...)<br>- Préparation à l'export de marchandise<br>- Tri des emballages alimentaires
                <div class="ContainerCompetence">
                    <div class="competences2">
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">Organisation</p>
                        </div>
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">Communication</p>
                        </div>
                        <div class="competence2">
                            <img src="../img/logo.png" class="logo2">
                            <p class="desc_competence">Motivation</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projet" id="Entreprise3">
                <h2 class='title_projet'>Stage de Découverte - Sequentiel (Chavanod)</h2>
                <p class="date_projet">Développeur WEB - Janvier 2021</p>
                <p class="description_projet">
                    En Janvier 2021, j'ai effectué un stage découverte de 3ème à Sequentiel, une agence de création de site web et d'application à Chavanod (74). <br> - Découverte de la programmation (HTML,CSS,JS...)<br>- Premier pas dans le monde professionnel<br>- Aperçu de la conception d'un site web et d'une application (chef de projet, développeurs, graphiste)<br>- Découverte de la cybersécurité
            </div>
        </div>
    </div>
    <div class="projetindex">
        <h3 class="h3">Index</h3>
        <ul>
            <li><a href="emile2.html#Entreprise1">Agent Polyvalent</a></li>
            <li><a href="emile2.html#Entreprise2">Logisticien</a></li>
            <li><a href="emile2.html#Entreprise3">Stage</a></li>
        </ul>
        <div class="navbar2">
            <div class="FirstLink2">
                <button class="button" id="togg7"><h1>Profil</h1></button> 
            </div>
            <div class="SecondLink2">
                <button class="button" id="togg8"><h1>Portfolio</h1></button>
            </div>
            <div class="ThirdLink2">
                <button class="button" id="togg9"><h1>Experience</h1></button>
            </div>
        </div>
    </div>
    
 </div>
 






 <script type="text/javascript" src="../js/emile.js"></script>

 </script>

</body>