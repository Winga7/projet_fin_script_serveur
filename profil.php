<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "gestionBDD.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "session.php";
$utilisateur = $_SESSION["utilisateur"];
// Empeche d'aller sur la page profile si aucun utilisateur n'est connecté
if (!isset($utilisateur)) {
  header("Location: index.php");
  exit();
}
// Permet de detruire le cookie de session
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["deco"])) {
    session_destroy();
    header("Location: index.php");
    exit();
  }
}
// Permet de supprimer le compte de l'utilisateur
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["supprimer"])) {
    $pdo = connexion_DB();
    $requete = "DELETE FROM utilisateurs WHERE uti_id = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':id', $utilisateur['uti_id'], PDO::PARAM_INT);
    $stmt->execute();
    session_destroy();
    header("Location: index.php");
    exit();
  }
}
$metaDesc = "Profile";
require_once __DIR__ . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "Controllers" . DIRECTORY_SEPARATOR . "changeprofil.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
// require_once __DIR__ . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "Controllers" . DIRECTORY_SEPARATOR . "authentificationController.php";


?>
<main id="profil">
  <h1>Bonjour <?= $utilisateur['uti_pseudo'] ?>,</h1>
  <p>Votre adresse mail est <?= $utilisateur["uti_email"] ?></p>
  <p>Bonne visite sur le site</p>
  <p>Vous pouvez changer votre profil, votre email ou votre mot de passe</p>
  <p>Vous pouvez aussi vous déconnecter, si vous souhaitez supprimez votre compte c'est possible (mais nous serons triste)</p>



  <fieldset id="chgdonnees">
    <legend>Changement de données</legend>

    <form id="formulaire" action="" method="post">
      <h3>Changement du nom de profil</h3>
      <input type="hidden" name="profil" value="pseudo">

      <label for="pseudo">Entrez votre nouveau profil</label>
      <input type="texte" name="pseudo" id="pseudo" placeholder="Votre Pseudo">

      <p class="erreur">
        <?=
        ($args["erreurs"]["pseudo"]) ?? "";

        ?>
      </p>
      <button type="submit" name="changepseudo">Changer Pseudo</button>
    </form>

    <form id="formulairerenvoie" method="post" action="">

      <h3>Changement de l'email</h3>

      <label for="email">Entrez votre nouvelle email</label>


      <input type="hidden" name="profil" value="mail">
      <input type="texte" name="email" id="email" placeholder="Votre Email">
      <p class="erreur">
        <?=
        ($args["erreurs"]["email"]) ?? "";
        ?>
      </p>
      <button type="submit" name="codeperdu">Changer Email</button>
    </form>





    <form id="formulairerenvoie" method="post" action="">

      <h3>Changement du mot de passe</h3>

      <input type="hidden" name="profil" value="mdp">

      <label for="mdp">Votre mdp :</label>

      <input type="password" name="mdp" id="mdp" minlength="2" maxlength="72" placeholder="Votre mot de passe ">

      <button type="submit" name="mdpchanger">Changer Mot de Passe</button>
    </form>

  </fieldset>
  <div id="fermeture">
    <form action="" method="post">
      <button type="submit" name="deco" value="deconnection">Déconnexion</button>
    </form>






    <form action="" method="post">
      <button type="submit" name="supprimer" value="supprimer">Supprimer mon compte</button>
    </form>
  </div>

</main>