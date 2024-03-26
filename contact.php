<?php
    $metaDesc = "Contact";
    require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
    require_once __DIR__ . DIRECTORY_SEPARATOR . "formulaire.php";
    ?>
    
    <main>
        <h1>Contact</h1>
        <form action="contact.php" method="post" id="contact">
                <fieldset>
                    <legend>Vos Coordonnées</legend>
                    <div class="coordonnees">
                        <div class="champs">
                            <label for="name">Nom :</label>
                            <input type="text" id="name" name="name" required />
                        </div>
                        <div class="champs">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="prenom" required />
                        </div>
                        <div class="champs">
                            <label for="tel">Téléphone :</label>
                            <input type="tel" id="tel" name="tel" required/>
                        </div>
                        <div class="champs">
                            <label for="mail">Mail :</label>
                            <input type="mail" id="mail" name="mail" required />
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Votre question</legend>
                    <textarea
                        name="question"
                        id="question"
                        cols="30"
                        rows="10"
                        required
                    ></textarea>
                </fieldset>
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>" />
                <button type="submit">Envoyer</button>
            </form>
    </main>

    <?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . "footer.php";
    ?>
