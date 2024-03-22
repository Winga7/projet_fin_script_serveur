<?php
    $metaDesc = "connexion";
    require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
    ?>
<main id="connexion">
        
        <form action="connexion.php" method="post">
            <fieldset>
                <legend>Connexion</legend>
                <div class"coordonnees">
                    <div class="champs">
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" id="pseudo" />
                    </div>
                    <div class="champs">
                        <label for="mail">E-Mail :</label>
                        <input type="email" name="mail" >
                    </div>
                    <div class="champs">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" >
            </fieldset>
        </form>
</main>
