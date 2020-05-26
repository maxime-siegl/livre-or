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
        <form action="connexion.php" method="POST">
            <p>
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </p>
            <input type="button" value="Se Connecter" name="connexion" id="connexion">
        </form>
        <?php
            $bdd = mysqli_connect('localhost', 'root', "", 'livreor')
                
            if (isset($_POST['connexion']))
            {
                $login = $_POST['login'];
                $mdp = $_POST['password'];

                $infodulog = "SELECT * FROM utlisateurs WHERE login = '$login'";
                $query = mysqli_query($bdd, $infodulog);
                $verifinfo = mysqli_fetch_all($query, MYSQLI_ASSOC);
                
                $mdpbdd = $verifinfo[0]['password']; //mdp qui correspond au login
                if (empty($verifinfo))
                {
        ?>
                <span>Le mot de passe n'est pas lié a ce login là !!</span>
        <?php
                }
                else
                {
                    if (password_verify($mdp, $mdpbdd))
                    {
                        session_start();
                        $_SESSION['login'] = $verifinfo[0]['login'];
                        $_SESSION['password'] = $verifinfo[0]['password'];
                        $_SESSION['id'] = $verifinfo[0]['id'];
                        header('location:index.php');
                    }
                    else
                    {
        ?>
                    <span>Login innexistant</span>
        <?php
                    }
                }
            }
            mtsqli_cloqe($bdd);
        ?>
    </main>
    <footer>
        <?php include("include/header.php") ?>
    </footer>
</body>
</html>