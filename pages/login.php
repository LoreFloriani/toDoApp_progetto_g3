<?php

session_start();
if (isset($_SESSION['user_id'])){
    header("Location: home.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Remindly</title>
    <link rel="stylesheet" href="../css/logniStyle.css?v=<?=time() ?>">
    <script defer src="../js/loginScript.js"></script>
</head>
<body>
<header>
    <div class="header-left">
        <a href="../index.html">
        <img src="../img/logo.png" alt="Logo Remindly" class="logo-small">
        </a>
        <h1>Remindly</h1>
    </div>
</header>

<main>
    <div class="form-container">
        <a href="../index.html">
        <img src="../img/logo.png" alt="Logo Remindly" class="logo-big">
        </a>
        <h2>Accedi al tuo account</h2>

        <form method="post" action="private/handleLogin.php" id="login-form">
            <label>
                Username:
                <input type="text" name="username" id="username" required>
            </label>

            <label>
                Password:
                <input type="password" name="password" id="password" required>
            </label>

            <button type="submit" class="btn">Accedi</button>
        </form>



        <?php
        if (isset($_GET['registered'])){
            switch ($_GET['registered']){
                case 0:
                    echo ('<p class="registrazioneF">Registrazione NON avvenuta<br>Errore DB: Impossibile creare l\'utente<br>Provare nuovamente <br></p>');
                    break;

                case 1:
                    echo ('<p class="registrazione">Registrazione avvenuta con successo <br></p>');
                    break;

                case 2:
                    echo ('<p class="registrazioneF">Registrazione NON avvenuta<br>Nome utente gia usato<br>Provare nuovamente <br></p>');
                    break;

                case 3:
                    echo ('<p class="registrazioneF">Registrazione NON avvenuta<br>La password deve contenere almeno 8 caratteri<br>Provare nuovamente <br></p>');
                    break;

                case 4:
                    echo ('<p class="registrazioneF">Registrazione NON avvenuta<br>Tutti i campi sono obbligatori<br>Provare nuovamente <br></p>');
                    break;

            }

        }
        ?>
        <p class="form-footer">Non hai un account? <a href="registration.html">Registrati qui</a></p>
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
