<?php
session_start();
unset($_SESSION['logato']);


?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remindly</title>
    <link rel="stylesheet" href="../css/indexStyle.css">
    <script defer src="../js/script.js"></script>
</head>
<body>
<header>
    <div class="header-left">
        <a href="index.php">
        <img src="../img/logo.png" alt="Logo Remindly" class="logo-small">
        </a>
        <h1>Remindly</h1>
    </div>
    <div class="header-right">
        <a href="login.php" class="btn">Accedi</a>
        <a href="registration.html" class="btn">Registrati</a>
    </div>
</header>

<main>
    <div class="main-content">
        <img src="../img/logo.png" alt="Logo Remindly" class="logo-big">
        <h1>Benvenuto in Remindly</h1>
        <h3>La miglior applicazione web per gestire i tuoi impegni!</h3>
        <div class="main-buttons">
            <a href="login.php" class="btn">Accedi</a>
            <a href="registration.html" class="btn">Registrati</a>
        </div>
    </div>
</main>

<footer>
    <div class="footer-left">
        <p>Progetto per le vacanze di Natale, commissionato dal <a href="https://github.com/leonardodeirossi">professor L. Deirossi</a> e dalla professoressa G. Peserico per la materia GPOI</p>
    </div>
    <div class="footer-center">
        <p>by <a href="https://github.com/LoreFloriani">Lorenzo Floriani</a>, <a href="https://github.com/AlbeCav">Alberto Cavallari</a> &  <a href="https://github.com/pietroAvi">Pietro Avi</a> </p>
    </div>
    <div class="footer-right">
        <p><a href="https://github.com/LoreFloriani/toDoApp_progetto_g3.git">Repository progetto</a></p>
    </div>
</footer>
</body>
</html>
