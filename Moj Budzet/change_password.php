<?php
require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/model/Korisnik.php";

$korisnikModel = new Korisnik($conn);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPass = $_POST['old_password'];
    $newPass = $_POST['new_password'];
    $confirmPass = $_POST['confirm_password'];

    if ($newPass !== $confirmPass) {
        $message = "Nove lozinke se ne poklapaju!";
        $status = "danger";
    } else {
        $user = $korisnikModel->login($_SESSION['username'], $oldPass);
        if ($user) {
            if ($korisnikModel->promeniLozinku($_SESSION['user_id'], $newPass)) {
                $message = "Lozinka uspešno promenjena!";
                $status = "success";
            } else {
                $message = "Došlo je do greške!";
                $status = "danger";
            }
        } else {
            $message = "Stara lozinka nije tačna!";
            $status = "danger";
        }
    }
}

require __DIR__ . "/view/change_password.php";