<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $prenom = $_POST["prenom"];
    $tel = $_POST["tel"];
    $mail = $_POST["mail"];
    $question = $_POST["question"];
    $errors = [];
    if (empty($name)){
        $errors[] = "Le nom est obligatoire";
    }
    if (empty($prenom)){
        $errors[] = "Le prénom est obligatoire";
    }
    if (empty($tel)){
        $errors[] = "Le téléphone est obligatoire";
    }
    if (empty($mail)){
        $errors[] = "Le mail est obligatoire";
    }
    if (empty($question)){
        $errors[] = "La question est obligatoire";
    }
    if (empty($errors)){
        $to = "
    }
}



?>