<?php

$prerequis = [
    "pseudo" => [
        "required" => true,
        "maxLength" => 40,
        "minLength" => 3
    ],
    "mail" => [
        "required" => true,
        'type' => 'email'
    ],
    "mdp" => [
        "required" => true,
        "maxLength" => 24,
        "minLength" => 6
    ]
];
