<?php
define('BASE_URL',"/projet_fin_script_serveur");

function Navigationint()
{
    $pages = [
        BASE_URL . "/index.php" => "Accueil",
        BASE_URL . "/contact.php" => "Contact",
    ];
    foreach ($pages as $page => $label){
        $class = ($_SERVER['REQUEST_URI'] == $page) ?'active' : '';
        echo '<li><a href="' . $page .'" class="' . $class . '">' . $label . '</a></li>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDesc?>">
    <link rel="stylesheet" href="<?= BASE_URL ?> /assets/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?> /assets/styleform.css">
    <link rel="icon" type="image/svg+xml" href="images/Winga.jpg" />
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
