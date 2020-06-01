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
                $bdd = mysqli_connect("localhost", "root", "", "livreor");
                $infologin = "SELECT * FROM utilisateurs WHERE login = '".$_SESSION['login']."' ";
                $recupinfo = mysqli_query($bdd, $infologin);
                $info_utilisateur = mysqli_fetch_all($recupinfo, MYSQLI_ASSOC);

                if (isset($_POST['modifier']) AND !empty($_POST['login']) AND !empty($_POST['mdpactuel'])) 
                {
                    if (password_verify($_POST['mdpactuel'], $_SESSION['password']))
                    {
                        $login = $_POST['login'];
                        $id = $_SESSION['id'];
                        $veriflog = "SELECT COUNT(*) AS num FROM utilisateurs WHERE login = '$login'";
                        $verif = mysqli_query($bdd, $veriflog);
                        $infolog = mysqli_fetch_all($verif, MYSQLI_ASSOC);
                    
                        if ($infolog[0]['num'] == 0 OR $login == $_SESSION['login'])
                        {
                            $update = "UPDATE utilisateurs SET login = '$login' WHERE id = '$id'";
                            $up = mysqli_query($bdd, $update);
                            $_SESSION['login'] = $_POST['login'];
                            echo 'Modification acceptée.';
                        }
                        else
                        {
                            echo 'Login pas disponible';
                        }

                        if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']))
                        {
                            if ($_POST['newmdp'] == $_POST['confnewmdp'])
                            {
                                $mdpupdate = password_hash($_POST['newmdp'], PASSWORD_BCRYPT);
                                $mdpup = "UPDATE utilisateurs SET password = '$mdpupdate' WHERE id = '$id'";
                                $querymdpup = mysqli_query($bdd, $mdpup);
                            }
                            else
                            {
                                echo 'les mots de passe ne correspondent pas, réessayez.';
                            }
                        }
                        header('location:profil.php');
                    }
                    else
                    {
                        echo 'Mot de passe incorrect.';
                    }
                }
        ?>
        <form action="profil.php" method="POST" class="formulaire">
            <p>
                <label for="login">Login</label>
                <input type="text" name="login" id="login" value="<?php echo $info_utilisateur[0]['login'] ?>" >
                <label for="mdpactuel">Mot de Passe actuel</label>
                <input type="password" name="mdpactuel" id="mdpactuel">
                <label for="newmdp">Nouveau Mot de Passe</label>
                <input type="password" name="newmdp" id="newmdp">
                <label for="confnewmdp">Confirmation du Nouveau Mot de Passe</label>
                <input type="password" name="confnewmdp" id="confnewmdp">
                <input type="submit" value="Modifier" name="modifier" class="submit">
            </p>
        </form>
        <?php
            }
            else
            {
        ?>
            <p>
            Pensez à vous connecter, ou à vous inscrire si vous êtes nouveau ici!!
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