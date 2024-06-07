<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Models" . DIRECTORY_SEPARATOR . "utilisateursModel.php";
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "formulaire.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["typeForm"] == "enregistrement") {
    $errors["pseudo"] = verifChamps($_POST["pseudo"], $prerequis["pseudo"]["minLength"], $prerequis["pseudo"]["maxLength"]);
    $errors["mail"] = verifChampMail($_POST["mail"]);
    $errors["mdp"] = verifChamps($_POST["mdp"], $prerequis["mdp"]["minLength"], $prerequis["mdp"]["maxLength"]);
    if (
      empty($errors["pseudo"])
      && empty($errors["mail"])
      && empty($errors["mdp"])
    ) {
      insertUtilisateur();
    } else {
      print_r($errors);
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["typeForm"] == "connexion") {
    $errors["mail"] = verifChampMail($_POST["mail"]);
    $errors["mdp"] = verifChamps($_POST["mdp"], $prerequis["mdp"]["minLength"], $prerequis["mdp"]["maxLength"]);
    if (
      empty($errors["pseudo"])
      && empty($errors["mail"])
      && empty($errors["mdp"])
    ) {;
    } else {
      print_r($errors);
    }
  }
}
