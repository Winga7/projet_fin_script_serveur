<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";


function Navigationint()
{
  $pages = [
    "/index.php" => "Accueil",
    "/contact.php" => "Contact",
    "/connexion.php" => "Connexion",
    "/profil.php" => "Profil",
  ];
  foreach ($pages as $page => $label) {
    $class = ($_SERVER['REQUEST_URI'] == $page) ? 'active' : '';
    echo '<li><a href="' . $page . '" class="' . $class . '">' . $label . '</a></li>';
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $metaDesc ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/assets/CSS/style.css">
  <!-- <link rel="stylesheet" href="/public/assets/CSS/styleform.css"> -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="icon" type="image/svg+xml" href="public/images/Winga.jpg" />
  <title>Mon Premier modèle Dynamique</title>
</head>

<body>
  <header>
    <nav>
      <ul>
        <?= Navigationint() ?>
      </ul>
    </nav>
  </header>