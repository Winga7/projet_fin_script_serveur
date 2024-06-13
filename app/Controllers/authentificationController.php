<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Models" . DIRECTORY_SEPARATOR . "utilisateursModel.php";
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "formulaire.php";
require_once dirname(__DIR__, 2) .  DIRECTORY_SEPARATOR .  "session.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["typeForm"] == "enregistrement") {
    $errors["pseudo"] = verifChamps($_POST["pseudo"], $prerequis["pseudo"]["minLength"], $prerequis["pseudo"]["maxLength"]);
    $errors["mail"] = verifChampMail($_POST["mail"]);
    $errors["mdp"] = verifChamps($_POST["mdp"], $prerequis["mdp"]["minLength"], $prerequis["mdp"]["maxLength"]);
    if (
      empty($errors["pseudo"]) && empty($errors["mail"]) && empty($errors["mdp"])
    ) {
      // echo
      insertUtilisateur();
    } else {
      print_r($errors);
    }
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["typeForm"] == "connexion") {

    $email =  champsNettoyer($_POST["mail"]);
    $mdp = champsNettoyer($_POST["mdp"]);
    $errors["mail"] = verifChampMail($email);
    $errors["mdp"] = verifChamps($mdp, $prerequis["mdp"]["minLength"], $prerequis["mdp"]["maxLength"]);

    if (
      empty($errors["mail"])
      && empty($errors["mdp"])
    ) {
      $utilisateur = connexionDB($email, $mdp);
      echo '<pre>' . print_r($utilisateur, true) . '</pre>';
      if ($utilisateur) {
        // Stocker les informations de l'utilisateur dans la session
        connecter_uti("utilisateur", $utilisateur);
        // $_SESSION["mail"] = connexion_DB($email, $mdp);
        header('Location: ' . BASE_URL . 'profil.php');

?>
        <!-- <script type="text/javascript">
          setTimeout(function() {
            window.location.href = BASE_URL. DS . "profil.php"; 
          }, 1000); // Redirection après 1 secondes
        </script> -->
<?php
      }
    } else {
      echo "Pas inscrit ou fomulaire mal rempli";
    }
  }
}
