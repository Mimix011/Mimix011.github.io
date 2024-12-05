1.
Mise en place du localhost :
- Utilisation de Uwamp
- Utilisation de php 7.0.2
- Utilisation de MySQL 5.6.20

-------------------------------------------------------
2.
Importation des bases de données :
- les dossiers compressées de la base de donnée sont dans le fichier Basededonnée
- il faut creer 4 BDD dans phpmyadmin (du meme nom que les dossiers compressées)
exemple : cyberfolio.sql.zip -> creation de la BDD "cyberfolio"
- importation des 4 dossiers .sql.zip un par un

Vous avez ainsi accès au localhost !

--------------------------------------------------------
3.
accès aux pages cachées :
- Acces à la page login.php (http://localhost/Web2/html/login.php) 
- Le login renvoie sur des pages administrateurs c'est pour cela qu'il n'est pas repertorié
- Utilisation du hashage sha1 pour le mot de passe de
- Pour acceder aux pages admin, il faut avoir le nom d'utilisateur et le mot de passe.
- Identifiant demonstration : 
    - id = emile
    - mot de passe = password


