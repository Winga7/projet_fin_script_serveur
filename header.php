<?php
define('BASE_URL',"/projet_fin_script_serveur");
echo $_SERVER['SCRIPT_NAME'];
function creerElement($href, $nomPage)
{
    
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
    <title>Document</title>
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="<?= BASE_URL ?> /index.php"></a>Accueil</li>
                <li><a href="<?= BASE_URL ?> /contact.php"></a>Contact</li>
            </ul>
        </nav>
    </header>
