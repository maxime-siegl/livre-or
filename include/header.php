<section id="menu">
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="livre-or.php">Livre d'Or</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li>
        <?php
            if (isset($_SESSION['login']))
            {
        ?>
            <form action="index.php" method="POST">
                <input type="submit" name="deco" value="Déconnexion">
            </form>
        <?php
            }
            else
            {
        ?>
                <form action="connexion.php">
                    <input type="submit" name="connexion" value="Connexion">
                </form>
        <?php
            }
        ?>
        </li>
    </ul>
</section>
<h1>Les Arts Culinaires Chez Soi</h1>