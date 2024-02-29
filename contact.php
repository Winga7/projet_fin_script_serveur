<?php
    $metaDesc = "Contact";
    require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
    ?>
    
    <main>
        <h1>Contact</h1>
        <div id="form">
            <form id="Form-contact" action="contact.php" method="post">
                <label for="nom">Nom :</label><input type="text" name="nom" id="nom" placeholder="Entrez votre nom" ><br>
                <label for="prenom">Prénom :</label><input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom"><br>
                <label for="mail">E-mail :</label><input type="email" name="mail" id="mail" placeholder="jevouscontact@gmail.com"><br>
                <label for="message">Message :</label><textarea name="message" id="message" placeholder="Entrez votre message"></textarea><br>
            </form>
        </div>
    </main>

    <?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . "footer.php";
    ?>
