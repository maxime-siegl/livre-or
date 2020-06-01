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
        <form action="commentaire.php" method="POST" class="formulaire">
            <p>
                <label for="com">Laissez vos commentaires ici:</label>
                <textarea name="com" id="com" cols="40" rows="15" placehorder="Entrer votre commentaire..."></textarea>
                <input type="submit" value="Poster" name="valider" class="submit">
            </p>
        </form>
        <?php
            if(isset($_SESSION['login']))
            {
                if (isset($_POST['valider']) AND !empty($_POST['com']))
                {
                    $commentaire = $_POST['com'];
                    $utilisateur = $_SESSION['id'];
                
                    $bdd = mysqli_connect("localhost", "root", "", "livreor");
                    $requetecom = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$commentaire', $utilisateur, NOW())";
                    $ajoutcom = mysqli_query($bdd, $requetecom);
                    mysqli_close($bdd);
                    header('Location:livre-or.php');
                }
            }
            else
            {
        ?>
            <p>
                Laisser un commentaire est réservé à nos membres.
            </p>
            <p>
                <a href="inscription.php">Inscrivez-vous</a> ou <a href="connexion.php">Connectez-vous</a> !!
            </p>
        <?php
            }
        ?>
    </main>
    <footer>
        <?php include("include/footer.php") ?>
    </footer>
</body>
</html>