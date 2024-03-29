<?php

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

?>