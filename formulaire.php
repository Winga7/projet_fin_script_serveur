<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $formNom = $_POST[formContact] ?? null;

    if ($formNom === "formConnexion")
    {
        echo "Traitement du formulaire de connexion";
    }
    else if ($formNom === "formCodeValidation")
    {
        echo "Traitement du formulaire pour le code de validation..."
    ;
    }
    else
    {
        echo "Il s'agit d'un formulaire sans nom..."
    }
}

function traitementContact(){
    $prerquis = [
        "nom" => [
            "required" => true,
            "max" => 40,
            "min" => 2
        ],
        "prenom" => [
            "required" => true,
            "max" => 20,
            "min" => 2
        ],
        "tel" => [
            "required" => true,
            "max" => 12,
            "min" => 10 
        ],
        "mail" => [
            "required" => true,
            "max" => 40,
            "min" => 5
        ],
        "question" => [
            "required" => true,
            "max" => 500,
            "min" => 10
        ]
        ];
}
?>