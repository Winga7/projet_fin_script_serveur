<?php

$prerequis = [
    "nom" => [
        "required" => true,
        "maxLength" => 40,
        "minLength" => 2
    ],
    "prenom" => [
        "required" => true,
        "maxLength" => 20,
        "minLength" => 2
    ],
    "tel" => [
        "required" => true,
        "maxLength" => 12,
        "minLength" => 10
    ],
    "mail" => [
        "required" => true,
        'type' => 'email'
    ],
    "question" => [
        "required" => true,
        "maxLength" => 500,
        "minLength" => 10
    ]
];
