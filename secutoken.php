<?php
session_start();

function generate_csrf_token() {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génère un jeton CSRF aléatoire de 32 octets
}

function validate_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;
}
?>
