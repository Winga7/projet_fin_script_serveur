<?php

require_once dirname(__DIR__)."/app/Models/contactmodel.php";

function champsNettoyer($valeur){
    return trim($valeur);
    return htmlspecialchars($valeur);
}

function verifLongueur($valeur, $min, $max){
    if(mb_strlen($valeur)<$min){
        return " Minimum ".$min." caractères";
    }elseif(mb_strlen($valeur)>$max){
        return "Maximum ".$max." caractères";
    }
}

function verifmail($mail){
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return "\n";
    } else {
        return "L'adresse mail '$mail' n'est pas valide!!!!!\n";
    }
}

function champvide($valeur){
    if(empty($valeur)){
        return "Ce champ est obligatoire!";
    }
}

function champexistant($existant){

}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nom = champsNettoyer($_POST["nom"]);
    $prenom = champsNettoyer($_POST["prenom"]);
    $tel = champsNettoyer($_POST["tel"]);
    $mail = champsNettoyer($_POST["mail"]);
    $question = champsNettoyer($_POST["question"]);
    print_r($nom.PHP_EOL);
    print_r($prenom.PHP_EOL);

    $errors = [];
    $errors["nom"] = verifLongueur($nom, 2 , 40);
    // $errors["nom"] = champvide($nom);
    $errors["prenom"] = verifLongueur($prenom, 2, 40);
    // $errors["prenom"] = champvide($prenom);
    $errors["tel"] = verifLongueur($tel, 10, 12);
    // $errors["tel"] = champvide($tel);
    $errors["mail"] = verifmail($mail);
    // $errors["mail"] = champvide($mail);
    $errors["question"] = verifLongueur($question, 10, 500);
    // $errors["question"] = champvide($question);

    print_r($errors);
}

function secuJs($donnee){
    $donnee = $_POST[$donnee];
    $donneeEchappee = htmlspecialchars($donnee);
    echo $donneeEchappee;
}

?>