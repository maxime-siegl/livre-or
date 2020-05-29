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
        <form action="livre-or.php" method="POST">
            <p>
                <label for="com">Laissez vos commentaires ici:</label>
                <textarea name="com" id="com" cols="30" rows="10" placehorder="Entrer votre commentaire..."></textarea>
                <input type="button" value="Poster" name="valider">
            </p>
        </form>
        <?php
            $bdd = mysqli_connect('localhost', 'root', '', 'livreor');

            if (isset($_POST['valider']))
            {
                $commentaire = $_POST['com'];
                $utilisateur = $_SESSION['id'];
                $date = Date("d/m/Y H:i:s");

                $requetecom = "INSERT INTO commentaires VALUE (null, "$commentaire", "$utilisateur", "$date")";
                $ajoutcom = mysqli_query($bdd, $requetecom);
                header('Location:livre-or.php');
            }
            else
            {
                echo 'petit prob test';
            }

            mysqli_close($bdd)
        ?>
    </main>
    <footer>
        <?php include("include/header.php") ?>
    </footer>
</body>
</html>