<?php
session_start();
require_once '../../core/functions.php';
require_once '../../core/database.php';

$nome = trim($_POST['nome'] ?? '');
$cognome = trim($_POST['cognome'] ?? '');
$email = trim($_POST['email'] ?? '');
$dataNascita = $_POST['dataNascita'] ?? '';
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$cPassword = $_POST['cPassword'] ?? '';


if ($password !== $cPassword) {
    die("Le password non coincidono.");
}


$result = create_user($pdo, $username, $password, $nome, $cognome, $dataNascita);

if ($result === true) {

    header('Location: ../login.html'); // reindirizza alla pagina login
    exit;
} else {

    echo $result;
}

