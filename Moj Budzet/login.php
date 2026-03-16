<?php
require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/model/Korisnik.php";

$korisnikModel = new Korisnik($conn);
$error = null;

if (isset($_POST['login'])) {
    $user = $korisnikModel->login($_POST['username'], $_POST['password']);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Pogrešno korisničko ime ili lozinka!";
    }
}

require __DIR__ . "/view/login.php";