<?php
$sqlInsertEmeric = "
    INSERT INTO personne (nom, type, contenu) VALUES
    ('Emeric', 'skill', 'Tests d\'intrusion avancés'),
    ('Emeric', 'skill', 'Sécurité des applications web (OWASP)'),
    ('Emeric', 'skill', 'Analyse de malwares'),
    ('Emeric', 'skill', 'Détection et réponse aux intrusions (EDR)'),
    ('Emeric', 'skill', 'Formation et sensibilisation à la cybersécurité')
";
if (mysqli_query($connection, $sqlInsertEmeric)) {
    echo '<p>Données pour Emeric insérées avec succès.</p>';
} else {
    echo '<p>Erreur lors de l\'insertion des données pour Emeric.</p>';
}

// Insertion des données pour Dimitri
$sqlInsertDimitri = "
    INSERT INTO personne (nom, type, contenu) VALUES
    ('Dimitri', 'certification', 'Google Cybersecurity Certificate'),
    ('Dimitri', 'certification', 'Certified Secure Software Lifecycle Professional (CSSLP)'),
    ('Dimitri', 'certification', 'Offensive Security Web Expert (OSWE)'),
    ('Dimitri', 'certification', 'ISO/IEC 27001 Lead Auditor'),
    ('Dimitri', 'certification', 'GIAC Security Essentials (GSEC)'),
    ('Dimitri', 'skill', 'Sécurisation des systèmes d\'exploitation (Linux, Windows)'),
    ('Dimitri', 'skill', 'Analyse forensique numérique'),
    ('Dimitri', 'skill', 'Automatisation de la sécurité avec Python'),
    ('Dimitri', 'skill', 'Sécurisation des API'),
    ('Dimitri', 'skill', 'Gestion des risques et conformité')
";
if (mysqli_query($connection, $sqlInsertDimitri)) {
    echo '<p>Données pour Dimitri insérées avec succès.</p>';
} else {
    echo '<p>Erreur lors de l\'insertion des données pour Dimitri.</p>';
}

// Insertion des données pour Ilyass
$sqlInsertIlyass = "
    INSERT INTO personne (nom, type, contenu) VALUES
    ('Ilyass', 'certification', 'Microsoft Cybersecurity Architect (SC-100)'),
    ('Ilyass', 'certification', 'Cisco Certified CyberOps Associate'),
    ('Ilyass', 'certification', 'Certified Threat Intelligence Analyst (CTIA)'),
    ('Ilyass', 'certification', 'Blue Team Level 1 (BTL1)'),
    ('Ilyass', 'certification', 'Certified Blockchain Security Professional (CBSP)'),
    ('Ilyass', 'skill', 'Threat Intelligence et veille en cybersécurité'),
    ('Ilyass', 'skill', 'Sécurisation des infrastructures réseau'),
    ('Ilyass', 'skill', 'Utilisation des outils de détection comme Wireshark'),
    ('Ilyass', 'skill', 'Développement de scripts défensifs'),
    ('Ilyass', 'skill', 'Cryptographie avancée')
";
if (mysqli_query($connection, $sqlInsertIlyass)) {
    echo '<p>Données pour Ilyass insérées avec succès.</p>';
} else {
    echo '<p>Erreur lors de l\'insertion des données pour Ilyass.</p>';
}
?>