<?php
require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/controller/KategorijaController.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$controller = new KategorijaController($conn);
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'dodaj':
        $controller->dodaj($_POST, $_SESSION['user_id']);
        break;
    case 'izmeni':
        $controller->izmeni($_POST, $_SESSION['user_id']);
        break;
    case 'obrisi':
        $controller->obrisi($_GET['id'], $_SESSION['user_id']);
        break;
    default:
        $controller->index($_SESSION['user_id']);
        break;
}