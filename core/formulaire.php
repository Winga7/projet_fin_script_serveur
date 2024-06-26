<?php

function champsNettoyer($valeur)
{
  $valeurNettoyee = trim($valeur);
  $valeurNettoyee = htmlspecialchars($valeurNettoyee);
  return $valeurNettoyee;
}

function verifLongueur($valeur, $min, $max)
{
  if (mb_strlen($valeur) < $min) {
    return " Minimum " . $min . " caractères";
  } elseif (mb_strlen($valeur) > $max) {
    return "Maximum " . $max . " caractères";
  }
}

function verifmail($mail)
{
  if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    return "L'adresse mail '$mail' n'est pas valide!!!!!\n";
  }
}

function champvide($valeur)
{
  if (empty($valeur)) {
    return "Ce champ est obligatoire!";
  }
}

function champexistant($valeur)
{
  if (!isset($valeur)) {
    return "Le champ {$valeur} est obligatoire!";
  }
}

function verifChamps($value, $min, $max): array
{
  $valeurNettoyer = champsNettoyer($value);
  $errors = [];


  $errors[] = champexistant($valeurNettoyer);
  $errors[] = champvide($valeurNettoyer);
  $errors[] = verifLongueur($valeurNettoyer, $min, $max);

  foreach ($errors as $err) {
    if (is_string($err)) {
      return $errors;
    }
  }
  // echo $errors;
  return [];
}

function verifChampMail($value): array
{
  $valeurNettoyer = champsNettoyer($value);
  $errors = [];


  $errors[] = champexistant($valeurNettoyer);
  $errors[] = champvide($valeurNettoyer);
  $errors[] = verifmail($valeurNettoyer);

  foreach ($errors as $err) {
    if (is_string($err)) {
      return $errors;
    }
  }
  return [];
}



// $nom = champsNettoyer($_POST["nom"]);
// $prenom = champsNettoyer($_POST["prenom"]);
// $tel = champsNettoyer($_POST["tel"]);
// $mail = champsNettoyer($_POST["mail"]);
// $question = champsNettoyer($_POST["question"]);
// print_r($nom . PHP_EOL);
// print_r($prenom . PHP_EOL);

// $errors = [];
// $errors["nom"] = champexistant($nom);
// $errors["nom"] = champvide($nom);
// $errors["nom"] = verifLongueur($nom, 2, 40);
// $errors["prenom"] = champexistant($nom);
// $errors["prenom"] = champvide($prenom);
// $errors["prenom"] = verifLongueur($prenom, 2, 40);
// $errors["tel"] = champexistant($nom);
// $errors["tel"] = champvide($tel);
// $errors["tel"] = verifLongueur($tel, 10, 12);
// $errors["mail"] = champexistant($nom);
// $errors["mail"] = champvide($mail);
// $errors["mail"] = verifmail($mail);
// $errors["question"] = champexistant($nom);
// $errors["question"] = champvide($question);
// $errors["question"] = verifLongueur($question, 10, 500);



function secuJs($donnee)
{
  $donnee = $_POST[$donnee];
  $donneeEchappee = htmlspecialchars($donnee);
  echo $donneeEchappee;
}
