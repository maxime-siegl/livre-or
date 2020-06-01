<?php
    session_start();
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
            $bdd = mysqli_connect('localhost', 'root', '', 'livreor');
            $com = "SELECT commentaires.commentaire, date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC";
            $querycom = mysqli_query($bdd, $com);
            $recupcominfo = mysqli_fetch_all($querycom, MYSQLI_ASSOC);

            foreach ($recupcominfo as $recupcom) 
            {
                $date = date('d/m/Y' , strtotime($recupcom["date"]));
        ?>
        <section>
            <h4>
                Commentaire de <?php echo $recupcom['login']; ?>, posté le <?php echo $date; ?>
            </h4>
            <p>
                <?php echo $recupcom['commentaire']; ?>
            </p>
        </section>
        <?php
            }
        ?>
    </main>
    <footer>
        <?php include("include/footer.php") ?>
    </footer>
</body>
</html>