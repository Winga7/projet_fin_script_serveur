<?php

$prerequis = [
    "pseudo" => [
        "required" => true,
        "maxLength" => 40,
        "minLength" => 3
    ],
    "mail" => [
        "required" => true,
        'type' => 'email'
    ],
    "mdp" => [
        "required" => true,
        "maxLength" => 24,
        "minLength" => 6
    ]
];

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

    $nomDuServeur = "localhost";
    $nomUtilisateur = "root";
    $motDePasse = "";
    $nomBDD = "ifosup_chri";

    try {
        // Instancier une nouvelle connexion.
        $pdo = new PDO("mysql:host=$nomDuServeur;dbname=$nomBDD;charset=utf8", $nomUtilisateur, $motDePasse);

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

function insertUtilisateur()
{
    try {
        // Instancier la connexion à la base de données.
        $pdo = connexion_DB();
        $requete = "INSERT INTO utilisateurs (uti_pseudo, uti_email, uti_motdepasse) VALUES (:pseudo, :mail,:mdp)";

        // Préparer la requête SQL.
        $stmt = $pdo->prepare($requete);

        // Lier les variables aux marqueurs :
        $stmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
        $stmt->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);

        // Exécuter la requête.
        $stmt->execute();
    } catch (PDOException $e) {
        gerer_exceptions($e);
    }
}
