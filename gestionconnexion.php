<?php

define("DEV_MODE", true);

// Tenter d'établir une connexion à la base de données :
function gerer_exceptions(PDOException $e): void
{
  // Limiter l'affichage des erreurs au mode "développement" pour éviter le risque de communiquer des données sensibles
  // lorsqu'une erreur se produit en mode "production" (lorsque le site est en ligne) :
  if (defined('DEV_MODE') && DEV_MODE === true) {
    echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
  }
}
function connexion_DB()
{

  $nomDuServeur = "localhost";
  $nomUtilisateur = "root";
  $motDePasse = "";
  $nomBDD = "ifosup_chri";

  try {
    // Instancier une nouvelle connexion.
    $pdo = new PDO("mysql:host=$nomDuServeur;dbname=$nomBDD;charset=utf8", $nomUtilisateur, $motDePasse);

    // Définir le mode d'erreur sur "exception".
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }
  // Capturer les exceptions en cas d'erreur de connexion :
  catch (PDOException $e) {
    // Afficher les potentielles erreurs rencontrées lors de la tentative de connexion à la base de données.
    // Attention, les informations affichées ici pouvant être sensibles, cet affichage est uniquement destiné à la phase de développement.
    echo "Erreur d'exécution de requête : " . $e . PHP_EOL;
  }
};
function donnee()
{
  try {
    // Instancier la connexion à la base de données.
    $pdo = connexion_DB();

    // Cette requête interroge la table "utilisateurz" afin de retourner tous les utilisateurs.
    $requete = "SELECT * FROM utilisateurs";

    // La méthode "query()" est utilisée pour exécuter une requête SQL qui retourne un jeu de résultats, ce qui est le cas des requêtes "SELECT".
    // La méthode retourne "false" si la requête n'a rien trouvé.
    $stmt = $pdo->query($requete);

    // La méthode "fetchAll()" permet de récupérer tous les éléments issues de la requête sous forme de tableau.
    // Le paramètre "PDO::FETCH_ASSOC" permet de préciser que l'on désire obtenir des tableaux associatifs (nomColonne => valeur) plutôt que des objets.
    // La méthode retourne un tableau vide si la requête n'a rien trouvé.
    // Dans ce contexte, la requête retournera un tableau dans lequel chaque élément correspond à un utilisateur
    // et où chaque utilisateur sera représenté par un tableau associatif comprenant toutes les informations de l'utilisateur.
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    gerer_exceptions($e);
  }
  if (isset($utilisateurs) && !empty($utilisateurs)) {
    ob_start();
?>
    <ul>
      <?php
      foreach ($utilisateurs as $utilisateur) {
      ?>
        <li>Pseudo : <?= $utilisateur['utiPseudo'] ?>, E-mail : <?= $utilisateur['utiMail'] ?></li>
      <?php
      }
      ?>
    </ul>
<?php
    echo ob_get_clean();
  }
}
// function inscriptions($pseudo,$email,$mdp)
// {
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  try {
    // Instancier la connexion à la base de données.
    $pdo = connexion_DB();
    $requete = "INSERT INTO utilisateurs (utiPseudo, utiMail, utiMotDePasse) VALUES (:pseudo, :mail,:mdp)";

    // Préparer la requête SQL.
    $stmt = $pdo->prepare($requete);

    // Lier les variables aux marqueurs :
    $stmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
    $stmt->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);

    // Exécuter la requête.
    $stmt->execute();
  } catch (PDOException $e) {
    gerer_exceptions($e);
  }
}
// }
?>

<h1>Données du serveur</h1>