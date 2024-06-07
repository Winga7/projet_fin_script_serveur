<?php

require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "gestionBDD.php";

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
