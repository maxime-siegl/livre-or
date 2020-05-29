<?php

?>
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
        <?php
            if (isset($_SESSION['login']))
            {
                $bdd = myqli_connect('localhost', 'root', '', 'livreor');
                $com = "SELECT commentaire, id_utilisateur, date FROM commentaires WHERE ... ORDER BY date"; // selectionner le tableau commentaire par ordre de date du plus recent au plus ancien et où les id_utilisateur = login
                $querycom = mysqli_query($bdd, $com);
                $recupcom = mysqli_fetch_all($querycom, MYSQLI_ASSOC);
                echo $recupcom;
            }
        ?>
    </main>
    <footer>
        <?php include("include/header.php") ?>
    </footer>
</body>
</html>