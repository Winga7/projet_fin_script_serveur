<?php
$metaDesc = "Profile";
require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "session.php";
$utilisateur = $_SESSION["utilisateur"];
?>
<main>
  <h1>bonjour <?= $utilisateur['uti_pseudo'] ?> , <?= $utilisateur["uti_email"] ?></h1>
  <form action="" method="post">
    <button type="submit" name="deco" value="deconnection">Déconnexion</button>
  </form>
</main>