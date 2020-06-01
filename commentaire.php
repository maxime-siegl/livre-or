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
        <form action="commentaire.php" method="POST">
            <p>
                <label for="com">Laissez vos commentaires ici:</label>
                <textarea name="com" id="com" cols="40" rows="15" placehorder="Entrer votre commentaire..."></textarea>
                <input type="submit" value="Poster" name="valider">
            </p>
        </form>
        <?php
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
        ?>
    </main>
    <footer>
        <?php include("include/footer.php") ?>
    </footer>
</body>
</html>