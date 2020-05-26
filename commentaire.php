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
    </main>
    <footer>
        <?php include("include/header.php") ?>
    </footer>
</body>
</html>