<?php
// Prendi dati dal form
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Array utenti/password
$utenti = [
    "lorenzo"     => "pass1234",
    "mario"       => "mario2024",
    "giulia"      => "giuliaPwd",
    "anna"        => "anna456",
    "paolo"       => "paolo789",
    "luca"        => "luca321",
    "francesca"   => "fraPass",
    "andrea"      => "andreapwd",
    "simone"      => "simo2025",
    "chiara"      => "chiara000"
];

// Controllo login
if (isset($utenti[$username]) && $utenti[$username] === $password) {
    // Login riuscito
    header("Location: ../home.php");
    // Qui puoi fare session_start() e salvare username in $_SESSION
} else {
    // Login fallito
    echo ("<script>
            alert('Username o password errati!');
            window.location.href = '../login.html';
          </script>");
}





/*

//funzione che si occupa di effettuare il login dell'utente
    require_once '../../core/functions.php';
   $result = handle_login($pdo, $username, $password);


   if($result === true) {
       // Login riuscito, reindirizza alla dashboard
       redirect('home.php');
   } else {
       // Mostra l'errore
       $error = $result;
   }
  */

?>