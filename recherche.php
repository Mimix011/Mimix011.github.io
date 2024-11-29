<?php
// Connexion à MySQL
$host = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'jaja';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Traitement AJAX pour la recherche
if (isset($_GET['type']) || isset($_GET['nom']) || isset($_GET['contenu'])) {
    // Récupérer les paramètres
    $typeRecherche = isset($_GET['type']) ? trim($_GET['type']) : ''; // Filtrer par type (skill ou certification)
    $nomRecherche = isset($_GET['nom']) ? trim($_GET['nom']) : ''; // Filtrer par nom
    $contenuRecherche = isset($_GET['contenu']) ? trim($_GET['contenu']) : ''; // Filtrer par contenu

    // Construction de la requête SQL de base
    $sql = "SELECT nom, type, contenu FROM personne WHERE 1";
    $params = [];

    // Si un type est spécifié, l'ajouter à la requête
    if ($typeRecherche) {
        $sql .= " AND type = :type";
        $params[':type'] = $typeRecherche;
    }

    // Si un nom est spécifié, l'ajouter à la requête
    if ($nomRecherche) {
        $sql .= " AND nom LIKE :nom";
        $params[':nom'] = '%' . $nomRecherche . '%';
    }

    // Si un contenu est spécifié, l'ajouter à la requête
    if ($contenuRecherche) {
        $sql .= " AND contenu LIKE :contenu";
        $params[':contenu'] = '%' . $contenuRecherche . '%';
    }

    // Si une recherche globale est spécifiée
    if (!empty($_GET['q'])) {
    $qRecherche = trim($_GET['q']);
    $sql .= " AND (nom LIKE :q OR type LIKE :q OR contenu LIKE :q)";
    $params[':q'] = '%' . $qRecherche . '%';
    }   


    // Préparer et exécuter la requête
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les résultats au format JSON
    echo json_encode($resultats);
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrage dynamique</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Filtrage dynamique des compétences et certifications</h1>
        

        <!-- Formulaire de filtrage -->
        <div class="mb-3 search">
    <label for="searchInput" class="form-label">Rechercher :</label>
    
    
    <!-- Div englobante pour la structure personnalisée -->
    <div class="one">
        <div class="two">
            <div class="three">
                <!-- Champ de recherche avec classes combinées -->
                <input 
                    type="text" 
                    id="searchInput" 
                    class="form-control four" 
                    placeholder="Recherchez par nom, contenu..." 
                />
            </div>
            <div class="stick"></div>
        </div>
    </div>
</div>


        <!-- Filtres supplémentaires -->
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
                <input type="text" id="nomFilter" class="form-control" placeholder="Nom...">
            </div>
            <div class="col">
                <label for="contenuFilter" class="form-label">Filtrer par contenu :</label>
                <input type="text" id="contenuFilter" class="form-control" placeholder="Contenu...">
            </div>
        </div>

        <div id="loading" class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>

        <div id="results" class="mt-3">
            <!-- Les résultats de la recherche apparaîtront ici -->
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Variables pour les critères de filtrage
            let searchQuery = ''; // Variable pour la recherche par texte
            let searchType = '';  // Variable pour filtrer par type (skill ou certification)
            let searchNom = '';   // Variable pour filtrer par nom
            let searchContenu = ''; // Variable pour filtrer par contenu

            // Recherche par texte
            $('#searchInput').on('input', function () {
                searchQuery = $(this).val();
                fetchResults();
            });

            // Filtrer par type
            $('#typeFilter').on('change', function () {
                searchType = $(this).val();
                fetchResults();
            });

            // Filtrer par nom
            $('#nomFilter').on('input', function () {
                searchNom = $(this).val();
                fetchResults();
            });

            // Filtrer par contenu
            $('#contenuFilter').on('input', function () {
                searchContenu = $(this).val();
                fetchResults();
            });

            // Fonction pour récupérer les résultats filtrés
            function fetchResults() {
                $('#loading').show(); // Afficher le spinner de chargement

                $.ajax({
                    url: 'recherche.php',
                    method: 'GET',
                    data: {
                        q: searchQuery,
                        type: searchType,
                        nom: searchNom,
                        contenu: searchContenu
                    },
                    dataType: 'json',
                    success: function (data) {
                        let resultsDiv = $('#results');
                        resultsDiv.empty(); // Effacer les anciens résultats

                        if (data.length > 0) {
                            data.forEach(function (item) {
                                resultsDiv.append(
                                    `<div class="result-item">
                                        <strong>${item.nom} (${item.type})</strong>: ${item.contenu}
                                    </div>`
                                );
                            });
                        } else {
                            resultsDiv.html('<p>Aucun résultat trouvé.</p>');
                        }
                    },
                    complete: function() {
                        $('#loading').hide(); // Masquer le spinner une fois les résultats reçus
                    }
                });
            }
        });
    </script>

</body>
</html>
