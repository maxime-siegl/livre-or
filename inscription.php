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
        <form action="inscription.php" method="POST" class="formulaire">
            <p>
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" id="password">
                <label for="confpw">Confirmation Mot de Passe</label>
                <input type="password" name="confpw" id="confpw">
                <input type="submit" value="S'inscrire" name="inscription">
            </p>
        </form>
        <?php
            $bdd = mysqli_connect("localhost", "root", "", "livreor");

            if (isset($_POST['inscription']))
            {
                $login = $_POST['login'];
                $mdp = $_POST['password'];

                $checklogin = "SELECT login FROM utilisateurs WHERE login = '$login'";
                $query = mysqli_query($bdd, $checklogin);
                $veriflogin = mysqli_fetch_all($query);

                if (empty($veriflogin))
                {
                    if ($_POST['password'] == $_POST['confpw'])
                    {
                        $cryptmdp = password_hash($mdp, PASSWORD_BCRYPT);
                        $ajoutbdd = 'INSERT INTO utilisateurs VALUES (null, "'.$login.'", "'.$cryptmdp.'")';
                        $ajout = mysqli_query($bdd, $ajoutbdd);
                        header('location:connexion.php');
                    }
                    else
                    {
                        echo 'La mot de passe et sa confirmation ne sont pas semblable. Réessayez.';
                    }
                }
                else
                {   
                    echo 'login pas disponible, trouvez-en un autre.';
                }
            }
            mysqli_close($bdd);
        ?>
    </main>
    <footer>
        <?php include("include/footer.php") ?>
    </footer>
</body>
</html>