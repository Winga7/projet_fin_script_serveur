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


function mdphackage($champNettoyer)
{
  return password_hash($champNettoyer, PASSWORD_DEFAULT);
}

function insertUtilisateur($pseudo, $mail, $mdp)
{
  try {
    // Instancier la connexion à la base de données.
    $pdo = connexion_DB();
    $requete = "INSERT INTO utilisateurs (uti_pseudo, uti_email, uti_motdepasse) VALUES (:pseudo,:mail,:mdp)";

    // Préparer la requête SQL.
    $stmt = $pdo->prepare($requete);

    // Lier les variables aux marqueurs :
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindValue(':mdp', mdphackage($mdp), PDO::PARAM_STR);

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
      // echo '<pre>' . print_r($mdp, true) . '</pre>';
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

      // echo '<pre>' . print_r($utilisateur, true) . '</pre>';

      //Permet de verifier si: utilisateur a une donnée et qu'elle correspond au mdp haché fourni
      if (isset($utilisateur) && !empty($utilisateur) && password_verify($mdp, $utilisateur['uti_motdepasse'])) {
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

function envoiMail($pseudo, $email)
{
  // Expéditeur de l'email.
  $expediteur = "Winga <contact@winga7.be>";

  // Destinataire de l'email.
  $destinataire = $pseudo . "<" . $email . ">";

  // Sujet de l'email.
  $sujet = "Bienvenue sur mon premier site dynamique";

  // Configurer les entêtes.
  $entetes = [
    "From" => $expediteur,
    "MIME-Version" => "1.0",
    "Content-Type" => "text/html; charset=\"UTF-8\"",
    "Content-Transfer-Encoding" => "quoted-printable"
  ];

  // Corps du message au format HTML.
  $message = "<html><body>";
  $message .= "<p>Bonjour, Bonsoir,</p>";
  $message .= "<p>Je te souhaite la bienvenue sur mon site</p>";
  $message .= "<p>A bientôt,</p>";
  $message .= "<p>Winga</p>";
  $message .= "</body></html>";

  // Tentative d'envoi du mail :
  if (mail($destinataire, $sujet, $message, $entetes)) {
    echo "Le courriel a été envoyé avec succès.";
  } else {
    echo "L'envoi du courriel a échoué.";
  }
}

// password_verify($args["code"], $utilisateur['uti_motdepasse'])
//