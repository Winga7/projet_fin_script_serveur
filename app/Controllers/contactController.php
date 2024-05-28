<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Models" . DIRECTORY_SEPARATOR . "contactmodel.php";
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "formulaire.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  print_r($prerequis["nom"]);
  $errors = [];
  $errors["nom"] = verifChamps($_POST["nom"], $prerequis["nom"]["minLength"], $prerequis["nom"]["maxLength"]);
  $errors["prenom"] = verifChamps($_POST["prenom"], $prerequis["prenom"]["minLength"], $prerequis["prenom"]["maxLength"]);
  $errors["tel"] = verifChamps($_POST["tel"], $prerequis["tel"]["minLength"], $prerequis["tel"]["maxLength"]);
  $errors["mail"] = verifChampMail($_POST["mail"]);
  $errors["question"] = verifChamps($_POST["question"], $prerequis["question"]["minLength"], $prerequis["question"]["maxLength"]);
  print_r($errors);
}
