<?php
require_once 'csrf.php';

// Générer le jeton CSRF
generate_csrf_token();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $to = "";
    }
    // Vérifier le jeton CSRF
    if(validate_csrf_token($_POST['csrf_token'])) {
        // Le jeton CSRF est valide, traiter les données du formulaire
        // Récupérer les données soumises via le formulaire
        $nom = $_POST["name"];
        $prenom = $_POST["prenom"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $question = $_POST["question"];
        
        // Faire quelque chose avec les données (par exemple, les enregistrer dans une base de données)
        
        // Afficher un message de confirmation
        echo "Merci pour votre soumission!";
        
        // Assurez-vous de détruire le jeton CSRF après utilisation pour des raisons de sécurité
        unset($_SESSION['csrf_token']);
    } else {
        // Le jeton CSRF est invalide, vous pouvez rediriger l'utilisateur vers une page d'erreur ou afficher un message
        echo "Jeton CSRF invalide!";
    }
};


?>