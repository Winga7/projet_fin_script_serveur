<?php
    $metaDesc = "Contact";
    require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
    ?>
    
    <main>
        <h1>Contact</h1>
        <form action="contact.php" method="post" id="contactSS">
                <fieldset>
                    <legend>Vos Coordonnées</legend>
                    <div class="coordonnees">
                        <div class="champs">
                            <label for="name">Nom :</label>
                            <input type="text" id="name" />
                        </div>
                        <div class="champs">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" />
                        </div>
                        <div class="champs">
                            <label for="tel">Téléphone :</label>
                            <input type="tel" id="tel" />
                        </div>
                        <div class="champs">
                            <label for="mail">Mail :</label>
                            <input type="mail" id="mail" />
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
                    ></textarea>
                </fieldset>
                <button type="submit">Envoyer</button>
            </form>
    </main>

    <?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . "footer.php";
    ?>
