<?php


function champsNettoyer($valeur){
    // if ($_SERVER["REQUEST_METHOD"] == "POST")
    // {
        return htmlspecialchars($valeur);
    // }
}

// function cleanInput($input)
// {
//   $input = trim($input);
//   $input = stripslashes($input);
//   $input = htmlspecialchars($input);
//   return $input;
// }
function verifLongueur($valeur, $min, $max){
  if(strlen($valeur)<$min){
    return " Minimum ".$min." caractères";
  }elseif(strlen($valeur)>$max){
    return "Maximum ".$max." caractères";
  }
}

function champvide($valeur){
    if(empty($valeur)){
        return "Ce champ est obligatoire!";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nom = champsNettoyer($_POST["nom"]);
    $prenom = champsNettoyer($_POST["prenom"]);
    print_r($nom.PHP_EOL);
    print_r($prenom.PHP_EOL);

    // nom doit avoir entre 2 et 40 caract   
    //    2 <  nom >  40
    // nom < 2 et nom > 40
    $errors = [];
    $errors["nom"] = verifLongueur($nom, 2 , 40);
    // $errors["nom"] = champvide($nom);
    $errors["prenom"] = verifLongueur($prenom, 2, 40);
    // $errors["prenom"] = champvide($prenom);

    print_r($errors);



    // $formNom = $_POST[formContact];

    // if ($formNom === "formConnexion")
    // {
    //     echo "Traitement du formulaire de connexion";
    // }
    // else if ($formNom === "formCodeValidation")
    // {
    //     echo "Traitement du formulaire pour le code de validation...";
    // }
    // else
    // {
    //     echo "Il s'agit d'un formulaire sans nom...";
    // }
}


$prerequis = [
    "nom" => [
        "required" => true,
        "maxLenght" => 40,
        "minLenght" => 2
    ],
    "prenom" => [
        "required" => true,
        "maxLenght" => 20,
        "minLenght" => 2
    ],
    "tel" => [
        "required" => true,
        "maxLenght" => 12,
        "minLenght" => 10 
    ],
    "mail" => [
        "required" => true,
        'type' => 'email'
    ],
    "question" => [
        "required" => true,
        "maxLenght" => 500,
        "minLenght" => 10
    ]
];

function secuJs($donnee){
    $donnee = $_POST[$donnee];
    $donneeEchappee = htmlspecialchars($donnee);
    echo $donneeEchappee;
}


?>