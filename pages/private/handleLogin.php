<?php
//funzione che si occupa di effettuare il login dell'utente
    require_once '../../core/functions.php';

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    $result = handle_login($pdo, $username, $password);
    
    if($result === true) {
        // Login riuscito, reindirizza alla dashboard
        redirect('home.php');
    } else {
        // Mostra l'errore
        $error = $result;
    }
?>