<?php

// la base de donne enregistre avec majuscule et minuscule?
if (DEV_MODE === true) {
  $envPath = dirname(__DIR__, 1) . "/.env.local";
} else {
  $envPath = dirname(__DIR__, 1) . "/.env";
}
if (file_exists($envPath)) {
  $env = file_get_contents($envPath);
  $lines = explode("\n", $env);
  foreach ($lines as $line) {
    preg_match("/([^#]+)\=(.*)/", $line, $matches);
    if (isset($matches[2])) {
      putenv(trim($line));
    }
  }
} else {
  echo "Fichier .env non trouvé à l'emplacement : $envPath";
}
// $env = file_get_contents($envPath);

// Tenter d'établir une connexion à la base de données :
function gerer_exceptions(PDOException $e): void
{
  // Limiter l'affichage des erreurs au mode "développement" pour éviter le risque de communiquer des données sensibles
  // lorsqu'une erreur se produit en mode "production" (lorsque le site est en ligne) :
  if (defined('DEV_MODE') && DEV_MODE === true) {
    echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
  }
}

function connexion_DB()
{
  try {
    // Instancier une nouvelle connexion.
    $pdo = new PDO("mysql:host=" . getenv("NOMDUSERVEUR") . ";dbname=" . getenv("NOMBDD") . ";charset=utf8", getenv("NOMUTILISATEUR"), getenv("MOTDEPASSE"));

    // Définir le mode d'erreur sur "exception".
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }
  // Capturer les exceptions en cas d'erreur de connexion :
  catch (PDOException $e) {
    // Afficher les potentielles erreurs rencontrées lors de la tentative de connexion à la base de données.
    // Attention, les informations affichées ici pouvant être sensibles, cet affichage est uniquement destiné à la phase de développement.
    echo "Erreur d'exécution de requête : " . $e . PHP_EOL;
  }
};
