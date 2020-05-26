<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="livre_or.css">
</head>
<body>
    <header>
        <?php include("include/header.php") ?>
    </header>
    <main>
        <h1>
            En route vers la belle vie!
        </h1>
        <?php
            if(isset($_SESSION['login']) == false) // pas de login pas de connexion
            {
        ?>
            <p>
                Avant toute chose commençons par vous créer un compte. Je vous invite à vous rendre sur le formualire d'<a href="inscription.php">inscription</a>
            </p>
        <?php
            }
            else // une fois connecté
            {
        ?>
        <p>
            Sur la route du bonheur pensez à nous laisser un petit <a href="commentaire.php">commentaire <span id="ici">ici</span></a>
        </p>
        <?php
            }
        ?>    
    </main>
    <footer>
        <?php include("include/header.php") ?>
    </footer>
</body>
</html>