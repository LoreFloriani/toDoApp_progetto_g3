<?php
session_start();
require_once '../../core/functions.php';
require_once '../../core/database.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    die("Inserisci username e password.");
}

$result = handle_login($pdo, $username, $password);

if (is_int($result)) {
    header("Location: ../home.php");
    exit;
} else {

    echo $result;
}

