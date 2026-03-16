<?php
require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/model/Korisnik.php";

$korisnikModel = new Korisnik($conn);
$error = null;

if (isset($_POST['register'])) {
    if ($korisnikModel->registruj($_POST['username'], $_POST['password'])) {
        echo "Uspešno registrovan! <a href='login.php'>Prijavi se</a>";
        exit;
    } else {
        $error = "Korisnik već postoji!";
    }
}

require __DIR__ . "/view/register.php";