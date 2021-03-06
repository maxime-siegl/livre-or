<?php
    session_start();
    if (isset($_POST['deco']))
    {
        session_destroy();
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
            <p>Vous êtes déjà connecté <?php echo $_SESSION['login'] ?> ;)</p>
            <p>Pensez à passer sur notre <a href="livre-or.php">livre d'or</a> pour y laisser votre avis.</p>
        <?php
            }
            else
            {
        ?>
        <form action="connexion.php" method="POST" class="formulaire">
            <p>
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Se Connecter" name="connexion" id="connexion" class="submit">
            </p>
        </form>
        <?php
                if (isset($_POST['connexion']))
                {
                    $login = $_POST['login'];
                    $mdp = $_POST['password'];

                    $bdd = mysqli_connect("localhost", "root", "", "livreor");
                    $infodulog = "SELECT * FROM utilisateurs WHERE login = '$login'";
                    $query = mysqli_query($bdd, $infodulog);
                    $resultat_info = mysqli_fetch_all($query, MYSQLI_ASSOC);
                
                    $mdpbdd = $resultat_info[0]['password']; //mdp qui correspond au login
                    if (!empty($resultat_info))
                    {
                        if (password_verify($mdp, $mdpbdd))
                        {
                            session_start();
                            $_SESSION['login'] = $resultat_info[0]['login'];
                            $_SESSION['password'] = $resultat_info[0]['password'];
                            $_SESSION['id'] = $resultat_info[0]['id'];
                            header('location:index.php');
                        }
                        else
                        {
    ?>
                        <p>Le mot de passe n'est pas lié a ce login là !!</p>
    <?php
                        }
                    }
                    else
                    {
    ?>
                <p>login inexistant !! Pensez à vous <a href="inscription.php">inscrire</a> d'abord.</p>
    <?php
                    }
                }
                mysqli_close($bdd);
            }
    ?>
    </main>
    <footer>
        <?php include("include/footer.php") ?>
    </footer>
</body>
</html>