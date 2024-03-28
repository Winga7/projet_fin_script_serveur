<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST")
// {
//     $formNom = $_POST[formContact];

//     if ($formNom === "formConnexion")
//     {
//         echo "Traitement du formulaire de connexion";
//     }
//     else if ($formNom === "formCodeValidation")
//     {
//         echo "Traitement du formulaire pour le code de validation..."
//     ;
//     }
//     else
//     {
//         echo "Il s'agit d'un formulaire sans nom..."
//     }
// }

function traitementContact(){
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
}

function secuJs($donnee){
    $donnee = $_POST[$donnee];
    $donneeEchappee = htmlspecialchars($donnee);
    echo $donneeEchappee;
}


?>