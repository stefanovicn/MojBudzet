<?php
class Korisnik {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registruj($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO korisnici (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hash);
        return $stmt->execute();
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM korisnici WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $korisnik = $result->fetch_assoc();

        if ($korisnik && password_verify($password, $korisnik['password'])) {
            return $korisnik;
        }
        return false;
    }

    public function promeniLozinku($userId, $novaLozinka) {
        $hashed = password_hash($novaLozinka, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("UPDATE korisnici SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashed, $userId);

        return $stmt->execute();
    }
}