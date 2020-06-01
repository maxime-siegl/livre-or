<?php
    session_start();
    if(isset($_POST['deco']))
    {
        session_destroy();
        header('location:index.php');
    }
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
        ?>
            <form action="commentaire.php">
                <p>
                    <input type="submit" value="Ajouter un commentaire" name="ajoutcom" class="submit">
                </p>
            </form>
        <?php
            }
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
            if (isset($_SESSION['login']))
            {
        ?>
            <form action="commentaire.php">
                <p>
                    <input type="submit" value="Ajouter un commentaire" name="ajoutcom" class="submit">
                </p>            
            </form>
        <?php
            }
        ?>
    </main>
    <footer>
        <?php include("include/footer.php") ?>
    </footer>
</body>
</html>