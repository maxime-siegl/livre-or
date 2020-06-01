<section id="menu">
    <ul>
        <li>Accueil</li>
        <li>Livre d'Or</li>
        <li>Profil</li>
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
        ?>
        </li>
    </ul>
</section>
<h1>Les Arts Culinères Chez Soi</h1>