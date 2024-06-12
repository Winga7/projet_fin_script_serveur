<?php

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "gestionBDD.php";

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
    $requete = "INSERT INTO utilisateurs (uti_pseudo, uti_email, uti_motdepasse) VALUES (:pseudo,:mail,:mdp)";

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

function connexionDB($email, $mdp)
{
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
      // Instancier la connexion à la base de données.
      $pdo = connexion_DB();

      $requete = "SELECT * FROM utilisateurs WHERE uti_email = :email";

      // Préparer la requête SQL.
      $stmt = $pdo->prepare($requete);

      // Lier les variables aux marqueurs :

      $stmt->bindValue(':email', $email, PDO::PARAM_STR);


      // $stmt->bindValue(':mdp', $args["code"], PDO::PARAM_STR);
      // Exécuter la requête.
      $estValide = $stmt->execute();
    } catch (PDOException $e) {
      gerer_exceptions($e);
    }
    if (isset($estValide) && $estValide !== false) {
      // $estvalide sera toujour true sauf s' il y une erreur dans le requete sql( exemple un nom de table mal ecrit)

      // Récupérer l'utilisateur issu de la requête DE LA DB.
      $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);


      //Permet de verifier si: utilisateur a une donnée et qu'elle correspond au mdp haché fourni
      if (isset($utilisateur) && !empty($utilisateur) && $utilisateur['uti_motdepasse'] === $mdp) {
        // echo '<pre>' . print_r($utilisateur, true) . '</pre>';
        return $utilisateur;

        // variable de session avec  $utilisateu pour mettre les donnée de dedans

        // $phrases = "ton nom : ";
        // $phrases .= $utilisateur["uti_pseudo"];
        // echo $phrases;
      } else {

        return false;
      }
    }
  }
}
// password_verify($args["code"], $utilisateur['uti_motdepasse'])
//