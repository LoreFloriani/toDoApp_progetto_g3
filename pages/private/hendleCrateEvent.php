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


$errors = [];

if ($titolo === '') $errors[] = "Il titolo è obbligatorio.";
if ($descrizione === '') $errors[] = "La descrizione è obbligatoria.";
if ($scadenza === '') $errors[] = "La scadenza è obbligatoria.";
if ($idCategoria === '') $errors[] = "La categoria deve essere selezionata.";

if (!empty($errors)) {
    foreach ($errors as $err) {
        echo "<p style='color:red;'>$err</p>";
    }
    echo '<p><a href="../home.php">Torna indietro</a></p>';
    exit;
}



$lastId = createEvent($pdo, $titolo, $descrizione, $scadenza, $_SESSION['user_id'], $idCategoria);

if ($lastId) {

    header("Location: ../home.php?success=1");
    exit;
} else {
    header("Location: ../home.php?success=-1");
    exit;
}


