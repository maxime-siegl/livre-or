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
        <form action="profil.php" mathod="POST">
            <p>
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
                <label for="mdpactuel">Mot de Passe actuel</label>
                <input type="password" name="mdpactuel" id="mdpactuel">
                <label for="newmdp">Nouveau Mot de Passe</label>
                <input type="password" name="newmdp" id="newmdp">
                <label for="confnewmdp">Confirmation du Nouveau Mot de Passe</label>
                <input type="password" name="confnewmdp" id="confnewmdp">
            </p>
            <input type="button" value="Modifier" name="modifier">
        </form>
    </main>
    <footer>
        <?php include("include/header.php") ?>
    </footer>
</body>
</html>