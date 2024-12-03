<?php
    $apiKey = 'cd88b053002b4479b30f01c64414b87a';
    $topic = 'cybersecurity';

    $url ="https://newsapi.org/v2/everything?q={$topic}&apiKey={$apiKey}";

    // initialisation de curl
    $ch=curl_init();
    //defini l'url de la requête curl
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    // Execute la requête 
    $response = curl_exec($ch);
    // Verification si une erreur et survenue 
    if(curl_exec($ch)){
        echo 'Erreur curl : '.curl_error($ch);
    }

    // Fermer la sesion cURL 
    curl_setopt($ch, CURLOPT_URL,$url);

    //Décoder la réponse JSON
    $data = json_decode($response,true);

    // Vérifier si nous avons des articles
    $article = isset($data['article'])? $data['articles']:[];
?>


<!DOCTYPE html>
<html>
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="/css/api.css">
        <title>Page De actu cyber<title>
    </header>
    <body>
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
                            <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                            <p><?php echo htmlspecialchars($article['description']); ?></p>
                            <a href="<?php echo htmlspecialchars($article['url']); ?>" target="_blank">Lire l'article complet</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Aucun article trouvé sur ce sujet.</p>
            <?php endif; ?>
        </div>
    </body>