<?php
$metaDesc = "Contact";
require_once __DIR__ . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "Controllers" . DIRECTORY_SEPARATOR . "contactController.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";

?>

<main>
    <form action="" method="POST" id="contact">
        <!-- <input type="hidden" name="formContact" value="formContact"> -->
        <fieldset>
            <legend>Vos Coordonnées</legend>
            <div class="coordonnees">
                <div class="champs">
                    <label for="nom">Nom :</label>
                    <input class="champs" type="text" id="nom" name="nom" placeholder="Ex : Dupuis*" required />
                </div>
                <?php
                if (isset($errors["nom"])) {
                    foreach ($errors["nom"] as $erreur) {
                        echo "<div class='erreur'>" . $erreur . "</div>";
                    }
                }
                ?>
                <div class="champs">
                    <label for="prenom">Prénom :</label>
                    <input class="champs" type="text" id="prenom" name="prenom" placeholder="Ex : Jean*" required />
                </div>
                <?php
                if (isset($errors["prenom"])) {
                    foreach ($errors["prenom"] as $erreur) {
                        echo "<div class='erreur'>" . $erreur . "</div>";
                    }
                }
                ?>
                <div class="champs">
                    <label for="tel">Téléphone :</label>
                    <input class="champs" type="tel" id="tel" name="tel" placeholder="0475 65 65 65*" required />
                </div>
                <?php
                if (isset($errors["tel"])) {
                    foreach ($errors["tel"] as $erreur) {
                        echo "<div class='erreur'>" . $erreur . "</div>";
                    }
                }
                ?>
                <div class="champs">
                    <label for="mail">Mail :</label>
                    <input class="champs" type="mail" id="mail" name="mail" placeholder="jean.dupuis@gmail.com*" required />
                </div>
                <?php
                if (isset($errors["mail"])) {
                    foreach ($errors["mail"] as $erreur) {
                        echo "<div class='erreur'>" . $erreur . "</div>";
                    }
                }
                ?>
            </div>
        </fieldset>
        <fieldset class="textarea">
            <legend>Votre question</legend>
            <textarea name="question" id="question" cols="30" rows="10" placeholder="Votre question ici*" required></textarea>
            <?php
            if (isset($errors["question"])) {
                foreach ($errors["question"] as $erreur) {
                    echo "<div class='erreur'>" . $erreur . "</div>";
                }
            }
            ?>
        </fieldset>
        <button type="submit">Envoyer</button>
    </form>
</main>

<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "footer.php";
?>