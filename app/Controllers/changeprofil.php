<?php
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "session.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Models" . DIRECTORY_SEPARATOR . "utilisateursModel.php";
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "formulaire.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["profil"] == "pseudo") {

    $pseudo =  champsNettoyer($_POST["pseudo"]);
    $errors["pseudo"] = verifChamps($_POST["pseudo"], $prerequis["pseudo"]["minLength"], $prerequis["pseudo"]["maxLength"]);

    if (
      empty($errors["pseudo"])
    ) {
      miseAJourUtilisateur($pseudo, "uti_pseudo", $_SESSION["utilisateur"]['uti_id']);
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["profil"] == "email") {
    $mail =  champsNettoyer($_POST["email"]);
    $errors["email"] = verifChampMail($_POST["email"]);
    if (empty($errors["email"])) {
      $result = miseAJourUtilisateur($mail, "uti_email", $_SESSION["utilisateur"]['uti_id']);
      if ($result === false) {
        error_log("Erreur lors de la mise à jour de l'utilisateur");
      } else {
        error_log("Utilisateur mis à jour avec succès");
      }
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["profil"] == "mdp") {
    if (isset($_POST["mdp"])) {
      $mdp =  champsNettoyer($_POST["mdp"]);
      $errors["mdp"] = verifChamps($_POST["mdp"], $prerequis["mdp"]["minLength"], $prerequis["mdp"]["maxLength"]);
      if (empty($errors["mdp"])) {
        miseAJourUtilisateur(mdphackage($mdp), "uti_motdepasse", $_SESSION["utilisateur"]['uti_id']);
      }
    } else {
      $errors["mdp"] = "Le mot de passe n'a pas été fourni.";
    }
  }
}
