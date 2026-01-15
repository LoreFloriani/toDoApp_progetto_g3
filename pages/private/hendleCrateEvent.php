<?php
session_start();
require_once '../../core/functions.php';
require_once '../../core/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.html");
    exit;
}

$titolo = trim($_POST['titolo'] ?? '');
$descrizione = trim($_POST['descrizione'] ?? '');
$scadenza = $_POST['scadenza'] ?? '';
$idCategoria = $_POST['idCategoria'] ?? '';



$lastId = createEvent($pdo, $titolo, $descrizione, $scadenza, $_SESSION['user_id'], $idCategoria);

if ($lastId) {

    header("Location: ../home.php?success=1");
    exit;
} else {
    header("Location: ../home.php?success=-1");
    exit;
}


