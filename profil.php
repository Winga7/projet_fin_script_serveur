<?php
$metaDesc = "Profile";
require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "session.php";
session_start();
echo '
<pre>' . print_r(uti_enligne("cookie"), true) . '</pre>';

?>
<main>
  <h1>bonjour <?= uti_enligne("cookie")['uti_pseudo'] ?> , <?= uti_enligne("cookie")["uti_email"] ?></h1>
  <form action="" method="post">
    <button type="submit" name="deco" value="deconnection">Déconnexion</button>
</main>