<?php
$metaDesc = "Profile";
require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
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
?>
<main>
  <h1>Bonjour <?= $utilisateur['uti_pseudo'] ?>,</h1>
  <p>Votre adresse mail est <?= $utilisateur["uti_email"] ?></p>
  <p>Bonne visite sur le site</p>
  <form action="" method="post">
    <button type="submit" name="deco" value="deconnection">Déconnexion</button>
  </form>
</main>