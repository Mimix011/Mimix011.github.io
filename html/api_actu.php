<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $apiKey='INI9zwFEU6GD6T7wbtAtzuBAoQzFl2wW';
    $topic ='Technology';


    $url ="https://api.nytimes.com/svc/search/v2/articlesearch.json?q={$topic}&api-key={$apiKey}";

    // initialisation de curl
    $ch=curl_init();

    if ($ch === false) {
        die('Erreur cURL : Impossible d\'initialiser la session cURL');
    }
    //defini l'url de la requête curl
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // **Désactive la vérification SSL**
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Execute la requête 
    $response = curl_exec($ch);
    // Verification si une erreur et survenue 
    if ($response === false) {
        echo 'Erreur cURL : ' . curl_error($ch);
        curl_close($ch);
        exit;
    }


    //Décoder la réponse JSON
    $data = json_decode($response,true);
    // Vérifier si le décodage a réussi
    if ($data === null) {
    echo "Erreur lors du décodage JSON : " . json_last_error_msg() . "<br>";
    exit;
    }

    // Vérifier si nous avons des articles
    if (isset($data['response']['docs']) && count($data['response']['docs']) > 0) {
        // Affichage des articles
        foreach ($data['response']['docs'] as $article) {
            $title = isset($article['headline']['main'])? htmlspecialchars($article['headline']['main']):'Titre non disponible';
            $abstract = isset($article['abstract']) ? htmlspecialchars($article['abstract']) : 'Résumé non disponible';
            $urlArticle = isset($article['web_url']) ? htmlspecialchars($article['web_url']) : '#';

            echo "<h2>" .$title. "</h2>";
            echo "<p>" .$abstract. "</p>";
            echo "<a href='" .$urlArticle. "' target='_blank'>Lire l'article complet</a><br><br>"; 
        }
    } else {
        echo "Aucun article trouvé sur ce sujet.<br>";
    }
    // Fermer la sesion cURL 
    curl_close($ch);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" id="theme-link">

        <title>Page De actu cyber</title>
    </head>
    <body>
        <video autoplay muted loop id="background-video">
            <source class="video_sombre" src="../img/background_index.mp4" type="video/mp4" id="video_d">
            Votre navigateur ne supporte pas les vidéos HTML5.
        </video>
        <nav>
            <section class="top-nav">
                <input id="menu-toggle" type="checkbox" />
                <label class="menu-button-container" for="menu-toggle">
                    <div class="menu-button"></div>
                </label>
                <ul class="menu">
                    <li><a href="../index.html">Accueil</a></li>
                    <li><a href="html/partenaires.html">Partenaire</a></li>
                    <li><a href="html/contact.html">Contact</a></li>
                    <li><a href="/html/Recherche2.php">Recherche</a></li>
                </ul>
            <a href="https://guardia.school/campus/lyon.html?utm_term=&utm_campaign=PMX+GU+-+Etudiants&utm_source=adwords&utm_medium=ppc&hsa_acc=1749547295&hsa_cam=20907422767&hsa_grp=&hsa_ad=&hsa_src=x&hsa_tgt=&hsa_kw=&hsa_mt=&hsa_net=adwords&hsa_ver=3&gad_source=1&gclid=Cj0KCQiA0fu5BhDQARIsAMXUBOLF5lQxduMnrC_3qKBJVAWHTUJK-DNhqhYN9tiGD5igEzrigsmo3pAaAjjzEALw_wcB">
                <img src="img/guardiagif.gif" alt="Logo" class="logo" href="test.html">
            </a>
            </section>
        </nav>

        <h1>Actue Cyber</h1>
        <div id ="api_data">
            <?php if (count($articles) > 0): ?>
                <div class="articles">
                    <?php foreach ($articles as $article): ?>
                        <div class="article">
                            <?php echo "<h2>" .$title. "</h2>";
                            echo "<p>" .$abstract. "</p>";
                            echo "<a href='" .$urlArticle. "' target='_blank'>Lire l'article complet</a><br><br>"; 
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Aucun article trouvé sur ce sujet.</p>
            <?php endif; ?>
        </div>
    </body>
</html>
